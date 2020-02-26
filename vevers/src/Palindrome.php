<?php namespace Vevers\DijAssessments;

use Vevers\DijAssessments\Contracts\PalindromeContract;

class Palindrome implements PalindromeContract
{
    /**
     * Determine whether or not a given $word is a so called palindrome.
     * @param string $word
     * @return bool
     */
    public function isPalindrome(string $word): bool
    {
        // Skip input with a length of <= 1, which technically aren't words
        if (strlen($word) <= 1) return false;

        // Normalize input
        $word = strtolower($word);

        // Check whether or not the reverse of $word equals $word
        return strrev($word) == $word;
    }

}