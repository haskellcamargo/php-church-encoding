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

// Now, let's represent the numerals. Did you already hear that 0 == true?
// Well, their representation are the same!
// Let's build the natural base numbers [0-9]

// λs.λz. z
$zero = fn($s) => fn($z) => $z; 

// λs.λz. s (s z)
$one    = fn($s) => fn($z) => $s($z); 

// λs.λz. s (s (s z))
$two    = fn($s) => fn($z) => $s($s($z));

// λs.λz. s (s (s (s z)))
$three  = fn($s) => fn($z) => $s($s($s($z)));

// λs.λz. s (s (s (s (s z))))
$four   = fn($s) => fn($z) => $s($s($s($s($z))));

// λs.λz. s (s (s (s (s (s z)))))
$five   = fn($s) => fn($z) => $s($s($s($s($s($z)))));

// λs.λz. s (s (s (s (s (s (s z))))))
$six    = fn($s) => fn($z) => $s($s($s($s($s($s($z))))));

// λs.λz. s (s (s (s (s (s (s (s z)))))))
$seven  = fn($s) => fn($z) => $s($s($s($s($s($s($s($z)))))));

// λs.λz. s (s (s (s (s (s (s (s (s z))))))))
$eight  = fn($s) => fn($z) => $s($s($s($s($s($s($s($s($z))))))));

// λs.λz. s (s (s (s (s (s (s (s (s (s z)))))))))
$nine   = fn($s) => fn($z) => $s($s($s($s($s($s($s($s($s($z)))))))));

// Defining the successor of a number according to the orders
// It combines a numeral $n and returns another church numeral. Yields a
// function (s)(z) -> s (... z ...) * $n
// We can define as:
// λn.λs.λz. s (n s z)
$succ = fn($n) => fn($s) => fn($z) => $s($n($s)($z));

// Arithmetic operations start here
// (+) is just $succ applied $x times to a church encoded number $n
// λx.λy.λs.λz. x s (y s z)
${'+'} = $plus = fn($x) => fn($y) => fn($s) => fn($z) => $x($s)($y($s)($z)); 

// We can define multiplication (*) as repeated applications of plus.
// λx. λy. x (plus y) zero
${'*'} = $mul = fn($x) => fn($y) => $x($plus($y))($zero);
