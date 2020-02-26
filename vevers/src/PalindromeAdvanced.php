<?php namespace Vevers\DijAssessments;

use Vevers\DijAssessments\Contracts\PalindromeContract;

class PalindromeAdvanced implements PalindromeContract
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

        // Check whether or not the first half of the word matches the reverse of the second half of the word
        $length = strlen($word);
        $lookUpLength = ceil($length / 2);

        for ($i = 0; $i < $lookUpLength; $i++) {
            $characterA = $word[$i];
            $characterB = $word[($length -1) - $i];

            // Stop as soon as we found a character that doesn't match
            if($characterA !== $characterB) return false;
        }

        return true;
    }
}