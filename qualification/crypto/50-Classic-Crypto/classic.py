#!/usr/bin/python

# Decrypt }h3dokh_yfvxlm_zdaqs_lselv_k_aqqkmm_iyepli_oxknymg_unukx_qy_yfryi{NOCEPEZE


def rot(c, value):
    value = ord(c)

    if (value >= ord('A') and value <= ord('Z')):
        value -= ord('A')
        value = (value + value) % 26
        value += ord('A')
    elif (value >= ord('a') and value <= ord('z')):
        value -= ord('a')
        value = (value + value) % 26
        value += ord('a')

    return chr(value)


def reverse(string):
    return string[::-1]


def encrypt(text):
    text = reverse(text)
    value = 13
    cipher_text = ''

    for c in text:
        cipher_char = rot(c, value)
        value = (value + 3) % 26
        cipher_text += cipher_char

    return cipher_text


if __name__ == '__main__':
    print '=== Gemastik - Classic Crypto ===\n\n'
    text = raw_input('Insert your text : ')
    cipher_text = encrypt(text)
    print "Encrypted text :"
    print cipher_text
