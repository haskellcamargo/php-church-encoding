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
$zero = function ($s) {
  return function ($z) {
    return $z;
  };
};

// λs.λz. s (s z)
$one = function ($s) {
  return function ($z) use ($s) {
    return $s($z);
  };
};

// λs.λz. s (s (s z))
$two = function ($s) {
  return function ($z) use ($s) {
    return $s($s($z));
  };
};

// λs.λz. s (s (s (s z)))
$three = function ($s) {
  return function ($z) use ($s) {
    return $s($s($s($z)));
  };
};

// λs.λz. s (s (s (s (s z))))
$four = function ($s) {
  return function ($z) use ($s) {
    return $s($s($s($s($z))));
  };
};

// λs.λz. s (s (s (s (s (s z)))))
$five = function ($s) {
  return function ($z) use ($s) {
    return $s($s($s($s($s($z)))));
  };
};

// λs.λz. s (s (s (s (s (s (s z))))))
$six = function ($s) {
  return function ($z) use ($s) {
    return $s($s($s($s($s($s($z))))));
  };
};

// λs.λz. s (s (s (s (s (s (s (s z)))))))
$seven = function ($s) {
  return function ($z) use ($s) {
    return $s($s($s($s($s($s($s($z)))))));
  };
};

// λs.λz. s (s (s (s (s (s (s (s (s z))))))))
$eight = function ($s) {
  return function ($z) use ($s) {
    return $s($s($s($s($s($s($s($s($z))))))));
  };
};

// λs.λz. s (s (s (s (s (s (s (s (s (s z)))))))))
$nine = function ($s) {
  return function ($z) use ($s) {
    return $s($s($s($s($s($s($s($s($s($z)))))))));
  };
};

// Defining the successor of a number according to the orders
// It combines a numeral $n and returns another church numeral. Yields a
// function (s)(z) -> s (... z ...) * $n
// We can define as:
// λn.λs.λz. s (n s z)
$succ = function ($n) {
  return function ($s) use ($n) {
    return function ($z) use ($s, $n) {
      $sub_call = $n($s);
      return $s($sub_call($z));
    };
  };
};

// Arithmetic operations start here
// (+) is just $succ applied $x times to a church encoded number $n
// λx.λy.λs.λz. x s (y s z)
${'+'} = $plus = function ($x) {
  return function ($y) use ($x) {
    return function ($s) use ($x, $y) {
      return function ($z) use ($s, $x, $y) {
        $subcall_1 = $y($s);
        $subcall_2 = $x($s);
        return $subcall_2($subcall_1($z));
      };
    };
  };
};

// We can define multiplication (*) as repeated applications of plus.
// λx. λy. x (plus y) zero
${'*'} = function ($x) use ($plus, $zero) {
  return function ($y) use ($x, $plus, $zero) {
    $call = $x($plus($y));
    return $call($zero);
  };
};
