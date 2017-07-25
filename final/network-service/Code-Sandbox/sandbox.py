#!/usr/bin/python

import sys


def show_message():
    message = open("message.txt", 'r').read()

    print message
    print "========== Python Sandbox 1.0 ==========="
    sys.stdout.flush()


def filter(s):
    blacklisttxt = open("blacklist.txt", 'r').read()
    blacklist = blacklisttxt.split('\n')
    for item in blacklist:
        if (item in s):
            s = "invalid"
            break
    return s


if __name__ == "__main__":
    show_message()

    while (True):
        print ">>> ",
        sys.stdout.flush()
        s = raw_input()
        s = filter(s)
        try:
            exec(s)
        except:
            print "Invalid Code"
        sys.stdout.flush()
