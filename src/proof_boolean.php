<?php
/**
 * The MIT License (MIT)
 *
 * Copyright (c) 2015 Haskell Camargo <marcelocamargo@linuxmail.org>
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

require_once 'boolean.php';

// Proofing that booleans can be converted from their encoded forms
# true
$proof_boolean_true = $boolean_to_primitive($true);
$proof_boolean_true = $proof_boolean_true(true);
$proof_boolean_true = $proof_boolean_true(false);
var_dump($proof_boolean_true);

# false
$proof_boolean_false = $boolean_to_primitive($false);
$proof_boolean_false = $proof_boolean_false(true);
$proof_boolean_false = $proof_boolean_false(false);
var_dump($proof_boolean_false);

// Proofing logical and
# true && true
$proof_and_true_true = $and($true);
$proof_and_true_true = $proof_and_true_true($true);
$proof_and_true_true = $proof_and_true_true(true);
$proof_and_true_true = $proof_and_true_true(false);
var_dump($proof_and_true_true);

# true && false
$proof_and_true_false = $and($true);
$proof_and_true_false = $proof_and_true_false($false);
$proof_and_true_false = $proof_and_true_false(true);
$proof_and_true_false = $proof_and_true_false(false);
var_dump($proof_and_true_false);

# false && false
$proof_and_false_false = $and($false);
$proof_and_false_false = $proof_and_false_false($false);
$proof_and_false_false = $proof_and_false_false(true);
$proof_and_false_false = $proof_and_false_false(false);
var_dump($proof_and_false_false);

// Proofing logical or
# true || false
$proof_or_true_false = $or($true);
$proof_or_true_false = $proof_or_true_false($false);
$proof_or_true_false = $proof_or_true_false(true);
$proof_or_true_false = $proof_or_true_false(false);
var_dump($proof_or_true_false);

# false || false
$proof_or_false_false = $or($false);
$proof_or_false_false = $proof_or_false_false($false);
$proof_or_false_false = $proof_or_false_false(true);
$proof_or_false_false = $proof_or_false_false(false);
var_dump($proof_or_false_false);

# false || true
$proof_or_false_true = $or($false);
$proof_or_false_true = $proof_or_false_true($true);
$proof_or_false_true = $proof_or_false_true(true);
$proof_or_false_true = $proof_or_false_true(false);
var_dump($proof_or_false_true);

// Proofing logical not
# !true
$proof_not_true = $not($true);
$proof_not_true = $proof_not_true(true);
$proof_not_true = $proof_not_true(false);
var_dump($proof_not_true);

# !false
$proof_not_false = $not($false);
$proof_not_false = $proof_not_false(true);
$proof_not_false = $proof_not_false(false);
var_dump($proof_not_false);

# !(true && true)
# $not($and($true)($true))(true)(false)
$true_and_true = $and($true);
$true_and_true = $true_and_true($true);
$proof_not_true_and_true = $not($true_and_true);
$proof_not_true_and_true = $proof_not_true_and_true(true);
$proof_not_true_and_true = $proof_not_true_and_true(false);
var_dump($proof_not_true_and_true);
