__license__ = 'Nathalie (c) EPITA'
__docformat__ = 'reStructuredText'
__revision__ = '$Id: heap.py 2022-03-20'

"""
Heap homework
2022 - S2
@author: platon.neutron
"""

# given function

def Heap():
    """
        returns a fresh new empty heap

        :rtype: list (heap)
    """
    return [None]


###############################################################################
# Do not change anything above this line, except your login!
# Do not add any import

def is_empty(H):
    """
        tests if the heap H is empty

        :param H: the heap
        :type H: list (hierarchical rep. of bintree)
        :rtype: bool
    """
    if (len(H) == 1 and H[0] == None):
        return True

    return False


def heap_push(H, elt, val):
    """
        adds the pair (val, elt) to heap H (in place: no need to return H)
    
        :param H: The heap
        :type H: list (hierarchical rep. of bintree)
        :param elt: The element to add
        :type elt: any
        :param val: The value associated to elt
        :type val: int or float
    """
    if (is_empty(H)):
        H.append((val, elt))

    else:
        H.append((val, elt))

        i = len(H) - 1
        j = i // 2
        (cVal, _) = H[i]
        (pVal, _) = H[j]

        while (pVal > cVal and j > 0):
            H[i], H[j] = H[j], H[i]

            i = j
            j = i // 2

            if (j > 0):
                (pVal, pElt) = H[j]


def heap_pop(H):
    """
        removes and returns the pair of the smallest value in the heap H, raises Exception if H is empty
    
        :param H: The heap
        :type H: list (hierarchical rep. of bintree)
        :rtype: (num, any) (the removed pair)
    """
    if (is_empty(H)):
        raise Exception("H cannot be empty")

    else:
        result = H[1]
        taille = len(H) - 1
        i, j = 1, taille
        finished = False

        while not (finished):
            if (i <= taille and j <= taille):
                H[i], H[j] = H[j], H[i]

                if (j != taille):
                    i = j

                left = i * 2
                right = (i * 2) + 1

                if (right <= taille - 1):
                    if (H[i][0] > H[left][0] and H[i][0] > H[right][0]):
                        mini = min((H[left][0], left), (H[right][0], right))
                        j = mini[1]

                    elif (H[i][0] > H[left][0] and H[i][0] < H[right][0]):
                        j = left

                    elif (H[i][0] > H[right][0] and H[i][0] < H[left][0]):
                        j = right

                    else:
                        finished = True

                elif (left <= taille - 1):
                    if (H[i][0] > H[left][0]):
                        j = left

                    else:
                        finished = True

                else:
                    finished = True

        H.pop()

    return result


# ---------------------------------------------------------------
def is_heap(T):
    """
        tests whether the complete tree T is a heap
    
        :param T: a complete tree in hierarchical representation
        :type T: list (hierarchical rep. of bintree)
        :rtype: bool
    """
    heap = True

    if (is_empty(T)):
        return heap

    else:
        i = len(T) - 1

        while (heap != False and i > 1):
            if (T[i // 2][0] <= T[i][0]):
                i -= 1

            else:
                heap = False

    return heap


def heap_sort(L):
    """
        sorts the associative list of (elements, values) L in increasing order according to values (not in place)
    
        :param L: a list containing pairs (element: any, value: int)
        :rtype: (any, num) list (the new list sorted)
    """
    result = []
    result2 = Heap()

    for i in range(len(L)):
        elt, val = L[i]
        heap_push(result2, elt, val)

    while (not is_empty(result2)):
        temp1, temp2 = heap_pop(result2)
        result.append((temp2, temp1))

    return result