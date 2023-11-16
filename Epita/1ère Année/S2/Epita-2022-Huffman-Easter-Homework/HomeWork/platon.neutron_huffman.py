__license__ = 'Junior (c) EPITA'
__docformat__ = 'reStructuredText'
__revision__ = '$Id: huffman.py 2022-04-17'

"""
Huffman homework
2022
@author: platon.neutron
"""

from algopy import bintree
from algopy import heap

###############################################################################
# Do not change anything above this line, except your login!
# Do not add any import
###############################################################################
## COMPRESSION

def buildfrequencylist(dataIN):
    """
        Builds a tuple list of the character frequencies in the input.
    """
    tempResult = []
    result = []
    present = False

    tempResult.append(dataIN[0])
    tempResult.append(1)

    for i in range(1, len(dataIN)):
        for j in range(0, len(tempResult), 2):
            if (dataIN[i] == tempResult[j]):
                tempResult[j + 1] += 1
                present = True

        if (present == False):
            tempResult.append(dataIN[i])
            tempResult.append(1)

        present = False

    for k in range(1, len(tempResult), 2):
        result.append((tempResult[k], tempResult[k - 1]))

    return result


def __petitTri(tupleList):
    """
        Sort the list take in parameter.
    """
    for i in range(len(tupleList)):
        x = tupleList[i]
        j = i

        while (j > 0 and (tupleList[j - 1][0] < x[0])):
            tupleList[j] = tupleList[j - 1]
            j -= 1

        tupleList[j] = x

def __binTreeList(tupleList):
    """
        Transform char in the tuples in BinTree.
    """
    result = []

    for i in range(len(tupleList)):
        result.append((tupleList[i][0], bintree.BinTree(tupleList[i][1], None, None)))

    return result

def buildHuffmantree(inputList):
    """
        Processes the frequency list into a Huffman tree according to the algorithm.
    """
    __petitTri(inputList)
    binTreeList = __binTreeList(inputList)

    while (len(binTreeList) != 1):
        plusPetit1 = binTreeList.pop()
        plusPetit2 = binTreeList.pop()
        freq = plusPetit1[0] + plusPetit2[0]

        maximum = max((plusPetit1[0], 1), (plusPetit2[0], 2))

        if (maximum[1] == 1):
            maximum = plusPetit1[1]
            minimum = plusPetit2[1]

        else:
            maximum = plusPetit2[1]
            minimum = plusPetit1[1]

        binTreeList.append((freq, bintree.BinTree(None, maximum, minimum)))
        i = len(binTreeList) - 1
        while (len(binTreeList) != 1 and i != 0 and binTreeList[i][0] > binTreeList[i - 1][0]):
            binTreeList[i], binTreeList[i - 1] = binTreeList[i - 1], binTreeList[i]
            i -= 1

    return binTreeList[0][1]


def __BuilsCorrespondenceTable(huffmanTree, result, code):
    """
        Function which build the correspondence table of a Huffman tree
        :param huffmanTree: a BinTree
        :param result: a list
        :param code: a string
        :return: a list a tuple (huffmanTree.key, string)
    """
    if (huffmanTree.left != None):
        left = code + "0"
        __BuilsCorrespondenceTable(huffmanTree.left, result, left)

    if (huffmanTree.right != None):
        right = code + "1"
        __BuilsCorrespondenceTable(huffmanTree.right, result, right)

    else:
        result.append((huffmanTree.key, code))

def encodedata(huffmanTree, dataIN):
    """
        Encodes the input string to its binary string representation.
    """
    # Build the Huffman correspondent table
    correspondenceTable = []
    code = ""
    __BuilsCorrespondenceTable(huffmanTree, correspondenceTable, code)

    # Encode the string "dataIN"
    result = ""

    for letter in dataIN:
        for correspondence in correspondenceTable:
            if (letter == correspondence[0]):
                result += correspondence[1]

    return result


def __ToBinary(intValue):
    """
        Function which convert int value in binary value
        :param intValue: an int value
        :return: the binary value of intValue
    """
    tempResult = []
    result = ""

    while (intValue != 0):
        b = intValue // 2
        tempResult.append(str(intValue % 2))
        intValue = b

    fakeLen = len(tempResult)
    while (fakeLen < 8):
        result += "0"
        fakeLen += 1

    while (tempResult != []):
        result += tempResult.pop()

    return result

def __EncodeTreeAux(huffmanTree, result):
    """
        Function which create recursively the right coding of huffmanTree
        :param huffmanTree: a BinTree
        :param result: a list
        :return: a list where "0" element are nodes, "1" element are leaves, "others" are the binary coding of the corresponding int value of the char
    """
    if (huffmanTree.left != None and huffmanTree.right != None):
        result.append("0")
        __EncodeTreeAux(huffmanTree.left, result)
        __EncodeTreeAux(huffmanTree.right, result)

    else:
        result.append("1")
        result.append(__ToBinary(ord(huffmanTree.key)))

def encodetree(huffmanTree):
    """
        Encodes a huffman tree to its binary representation using a preOrder traversal:
            * each leaf key is encoded into its binary representation on 8 bits preceded by '1'
            * each time we go left we add a '0' to the result
    """
    code = []
    result = ""
    __EncodeTreeAux(huffmanTree, code)

    for i in code:
        result += i

    return result


def tobinary(dataIN):
    """
        Compresses a string containing binary code to its real binary value.
    """
    comp = 0
    intValue = 0
    resultStr = ""
    resultInt = 0

    for i in range(len(dataIN) + 1):
        if (comp > 7):
            resultStr += chr(intValue)
            comp = 0
            intValue = 0

        if (i != len(dataIN)):
            if (comp == 0 and (i + 8) >= len(dataIN)):
                value = len(dataIN) - (i + 8)

                if (value < 0):
                    comp += -value
                    resultInt = -value

                elif (value == len(dataIN)):
                    comp += 1
                    resultInt = 1

            if (dataIN[i] == "1"):
                intValue += 2**(7 - comp)

            comp += 1

    return (resultStr, resultInt)


def compress(dataIn):
    """
        The main function that makes the whole compression process.
    """
    frequencyTable = buildfrequencylist(dataIn)
    huffmanTree = buildHuffmantree(frequencyTable)
    encodedData = encodedata(huffmanTree, dataIn)
    huffmanTreeEncoded = encodetree(huffmanTree)
    ((a, b), (c, d)) = (tobinary(encodedData), tobinary(huffmanTreeEncoded))

    return ((a, b), (c, d))

    
################################################################################
## DECOMPRESSION

def decodedata(huffmanTree, dataIN):
    """
        Decode a string using the corresponding huffman tree into something more readable.
    """
    # Build the Huffman correspondent table
    correspondenceTable = []
    code = ""
    __BuilsCorrespondenceTable(huffmanTree, correspondenceTable, code)

    # Decode the string "dataIN"
    result = ""
    code = ""

    for i in dataIN:
        code += i

        for correspondence in correspondenceTable:
            if (code == correspondence[1]):
                result += correspondence[0]
                code = ""

    return result


def __SliceData(dataIN):
    """
        Function which slice a string in substrings
        :param dataIN: a string
        :return: a list which contains the substrings
    """
    result = []
    i = 0

    while (i != len(dataIN)):
        if (dataIN[i] == "0"):
            result.append("0")
            i += 1

        elif (dataIN[i] == "1"):
            tempValue = ""
            start = False

            for j in range(1, 9):
                if ((i + j) != len(dataIN) and start == False):  # and dataIN[i + j] == "1"
                    tempValue += dataIN[i + j]
                    start = True

                elif (start == True):
                    tempValue += dataIN[i + j]

            result.append(tempValue)
            i += 9

    return result

def __ToInt(value):
    """
        Function which convert binary value in int value
        :param value: a binary value
        :return: the int value of value
    """
    exp = len(value) - 1
    result = 0

    for i in range(len(value)):
        if (value[i] == "1"):
            result += 2**exp
            exp -= 1

        else:
            exp -= 1

    return result

def __DecodeValue(sliceData):
    """
        Function which convert int value in char
        :param sliceData: an int value
        :return: the corresponding char
    """
    for i in range(len(sliceData)):
        if (len(sliceData[i]) > 1):
            sliceData[i] = chr(__ToInt(sliceData[i]))

def __ConvertToBinTree(list):
    """
        Function which convert the element in the list in BinTree
        :param list: a list of strings
        :return: the same list but all strings are BinTree
    """
    for i in range(len(list)):
        if (list[i] == "0"):
            list[i] = (bintree.BinTree(None, None, None), "noeud")

        else:
            list[i] = (bintree.BinTree(list[i], None, None), "element")

def __PartialBuildTree(list):
    """
        Function which build all possible nodes with this statement of the list
        :param list: alist of BinTree
        :return: a list but some BinTree are child of other BinTree
    """
    result = []
    borne = 0

    for i in range(len(list)):
        if (list[i][1] == "noeud"):
            if ((i + 1) < len(list) and list[i + 1][1] != "noeud"):
                if ((i + 2) < len(list) and list[i + 2][1] != "noeud"):
                    list[i][0].left = list[i + 1][0]
                    list[i][0].right = list[i + 2][0]
                    result.append((list[i][0], "element"))
                    borne = i + 2

                else:
                    result.append(list[i])
            else:
                result.append(list[i])

        elif (i > borne):
            result.append(list[i])
            borne = i

    return result

def decodetree(dataIN):
    """
        Decodes a huffman tree from its binary representation:
            * a '0' means we add a new internal node and go to its left node
            * a '1' means the next 8 values are the encoded character of the current leaf
    """
    result = __SliceData(dataIN)
    __DecodeValue(result)
    __ConvertToBinTree(result)

    while (len(result) != 1):
        result = __PartialBuildTree(result)

    return result[0][0]


def frombinary(dataIN, align):
    """
        Retrieve a string containing binary code from its real binary value (inverse of :func:`toBinary`).
    """
    result = ""

    for i in range(len(dataIN)):
        binaryCode = __ToBinary(ord(dataIN[i]))

        if (len(binaryCode) != 8):
            manquant = 8 - len(binaryCode)
            binaryCode = manquant * "0" + binaryCode

        if (i == len(dataIN) - 1):
            tempCode = ""

            for j in range(len(binaryCode)):
                if (j >= align):
                    tempCode += binaryCode[j]

            binaryCode = ""
            result += tempCode

        result += binaryCode

    return result


def decompress(data, dataAlign, tree, treeAlign):
    """
        The whole decompression process.
    """
    decompressedData = frombinary(data, dataAlign)
    decompressedTree = frombinary(tree, treeAlign)
    decodedTree = decodetree(decompressedTree)
    decodedData = decodedata(decodedTree, decompressedData)

    return decodedData
