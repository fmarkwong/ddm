<?php

/**
 * Get smallest integer in array 
 *
 * @param array $integers array of integers 
 *
 * @return int smallest integer 
 */
function getSmallestInt(Array $integers)
{
    $smallestInteger = $integers[0]; // current smallest integer

    // loop through array
    // if an integer is smaller that current smallest, then update current smallest integer
    foreach($integers as $integer) {
        if ($integer < $smallestInteger) { 
            $smallestInteger = $integer;
        }
    }

    return $smallestInteger;
}

echo "\nExample for getSmallestInt()\n";
echo "-----------------------------------\n";
$a = [1, 14, 13, 6, 92, 4, -5, 3];
echo getSmallestInt($a) . PHP_EOL;

/**
 * Display numbers from 1 to 100
 * mutltiples of 3 and 5, display FizzBuzz
 * mutltiples of 3, display Fizz
 * mutltiples of 5, display Buzz
 *
 */
function fizzBuzz()
{
    // use modulo to check for divisibilty
    // not using braces for if blocks because they are one line each
    foreach(range(1,100) as $i) {
        if ($i % 3 === 0 && $i %5 === 0) echo "FizzBuzz\n";
        elseif ($i % 3 === 0) echo "Fizz\n";
        elseif ($i % 5 === 0) echo "Buzz\n";
        else echo "$i\n";
    }

}

echo "\nExample for fizzBuzz()\n";
echo "-----------------------------------\n";
fizzBuzz();

/**
 * Check if text is a palindrome 
 *
 * @param string $text text to check 
 * @param string $algorithm which algorithm to use 
 *
 * @return bool whether $text is palindrome 
 */
function isPalindrome($text, $algorithm = 'a')
{
    if ($algorithm === 'a') return algorithmA($text);
    if ($algorithm === 'b') return algorithmB($text);
}

/**
 * This algorithm is faster because it references the characters of each string
 * using indices and only needs to traverse half the string
 */
function algorithmA($text)
{
    $lastIndex = strlen($text) - 1; 

    // compare first and last characters of string to see if they are the same
    // and continue traversing head and tail characters and comparing them
    //
    // for loop only needs to traverse half of since since we're using
    // headIndex (and lastIndex) to calculate tailIndex 
    foreach(range(0, intval($lastIndex/2)) as $headIndex) {
        $tailIndex = $lastIndex - $headIndex;
        if ($text[$headIndex] !== $text[$tailIndex]) return false; // mismatch, so false
    }

    return true; // no mismatches, so true
}


/**
 * This algorithm is basically doing the same thing as algorithm A, traversing the
 * string comparing the head and tail characters, but instead of using indices to 
 * reference characters, it converts the string into an array of chracters and gets
 * head and tail by shifting and popping off characters.
 *
 * It's less efficient but a little more straightforward.
 */
function algorithmB($text)
{
    $textArray = str_split($text);

    while(true) {
        $head = array_shift($textArray);
        $tail = array_pop($textArray);
        if (empty($tail)) return true; // finished checking all characters, no mismatches, so true
        if ($head !== $tail) return false; // mismatch, so false
    }
}


echo "\nExample for isPalindrome()\n";
echo "-----------------------------------\n";

foreach(['rotator', 'modem', 'civic', 'malloc'] as $text) {
    checkPalindrome($text);
}

function checkPalindrome($text)
{
    $isOrNot = isPalindrome($text) ? 'is' : 'is not';
    echo "$text $isOrNot a palindrome\n"; 
}


/**
 * Swap integer values of two variables 
 *
 * @param int $a first variable 
 * @param int $b second variable 
 *
 */
function swapIntegerValues(&$a, &$b)
{
    $a = $a + $b;
    $b = $a - $b; // calculate value of $a, store in $b
    $a = $a - $b; // calculate value of $b, store in $a
}

echo "\nExample for swapIntegerValues()\n";
echo "-----------------------------------\n";

$x = 5;
$y = 10;

echo "\$x contains $x\n";
echo "\$y contains $y\n\n";
echo "Now let's swap'em\n\n";

swapIntegerValues($x, $y);

echo "\$x now contains $x\n";
echo "\$y now contains $y\n\n";
