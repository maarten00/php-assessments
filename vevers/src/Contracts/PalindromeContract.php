<?php namespace Vevers\DijAssessments\Contracts;

interface PalindromeContract{
    public function isPalindrome(string $word): bool;
}