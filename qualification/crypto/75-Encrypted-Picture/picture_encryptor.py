#!/usr/bin/pythonn

from PIL import Image


im = Image.open('picture.png').convert('RGB')

(w, h) = im.size

seed_r = 0xCA
seed_g = 0xFE
seed_b = 0xBA

pix = im.load()

for i in range(0, h):
    for j in range(0, w):
        (r, g, b) = pix[j, i]

        r ^= seed_r
        g ^= seed_g
        b ^= seed_b

        seed_r = (seed_r + seed_g) % 0xFF
        seed_g = (seed_g + seed_b) % 0xFF
        seed_b = (seed_b + seed_r) % 0xFF

        pix[j, i] = (r, g, b)

im.save('encrypted.png')
