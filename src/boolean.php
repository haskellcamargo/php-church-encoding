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

// The representation of true is:
// λt.λf.t
$true = fn($t) => fn($f) => $t;

// The representation of f is:
// λt.λf.f
$false = fn($t) => fn($f) => $f;

// Receives a encoded logic $l value, an arbitrary expression $m and another
// arbitrary expression $n and evaluates to their primitive forms.
// λl.λm.λn. l m n
$boolean_to_primitive = fn($l) => fn($m) => fn($n) => $l($m)($n);

// Here we start to implement boolean algebra.
// Logical "and"
// We represent $l as the logic value and we return $c if $l is $true or $f
// if $l is $false. Therefore, by logic, if $l is $true and $c is $false, we
// return $c ($false), otherwise, when $l and $c are $true, return $true
// λl.λc l c false
$and = fn($l) => fn($c) => $l($c)($false);

// Logical "or"
// $l is the logic value. When $l is $false, return $c ($true or $false). When
// $l is $true, return $true (one matches, short circuit).
// λl.λc. l true c
$or = fn($l) => fn($c) => $l($true)($c);

// Logical "not"
// Return the oposite value by calling the conversion passing other encoded
// values. It can be chained and applied to other computations, since we
// return church-encoded values.
// Trivial.
// λl. l false true
$not = fn($l) => $l($false)($true);

// Only one of the operands can be true. We get false if both are false or both
// are true.
// λa.λb.a (b false true) (b true false)
$xor = fn($a) => fn($b) => $a($b($false)($true))($b($true)($false));
