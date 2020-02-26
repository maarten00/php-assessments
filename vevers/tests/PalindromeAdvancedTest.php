<?php declare(strict_types=1);

namespace Tests;

use Vevers\DijAssessments\PalindromeAdvanced;

class PalindromeAdvancedTest extends PalindromeTest
{
    protected function setUp(): void
    {
        $this->palindrome = new PalindromeAdvanced();
    }
}