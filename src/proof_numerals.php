<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2016 Haskell Camargo <marcelocamargo@linuxmail.org>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

require_once 'numerals.php';

// Proofing numerals from their base
# next 4 = 5
$proof_next_four_is_five = $succ($four);
$proof_next_four_is_five = $proof_next_four_is_five(function ($n) {
  return $n + 1; // native conversion *only* for exhibition
});
$proof_next_four_is_five = $proof_next_four_is_five(0); // native base
var_dump($proof_next_four_is_five);

// Proofing sum
# 9 + 8 = 17
$proof_9_plus_8_is_17 = ${'+'}($nine);
$proof_9_plus_8_is_17 = $proof_9_plus_8_is_17($eight);
$proof_9_plus_8_is_17 = $proof_9_plus_8_is_17(function ($n) {
  return $n + 1;
});
$proof_9_plus_8_is_17 = $proof_9_plus_8_is_17(0);
var_dump($proof_9_plus_8_is_17);
