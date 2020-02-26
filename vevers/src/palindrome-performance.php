<?php

use Vevers\DijAssessments\Contracts\PalindromeContract;
use Vevers\DijAssessments\Palindrome;
use Vevers\DijAssessments\PalindromeAdvanced;

//include("Palindrome.php");
//include("PalindromeAdvanced.php");

require __DIR__ . '/../vendor/autoload.php';

$iterations = 100000;

$validPalindrome = "saippuakivikauppias";
$nonPalindrome = "comprehensiblenesses";

echo "# Running tests for valid palindrome ({$iterations} iterations) \r\n";
testPalindromeClassPerformance(new Palindrome(), $iterations, $validPalindrome);
testPalindromeClassPerformance(new PalindromeAdvanced(), $iterations, $validPalindrome);

echo "# Running tests for non-palindrome ({$iterations} iterations) \r\n";
testPalindromeClassPerformance(new Palindrome(), $iterations, $nonPalindrome);
testPalindromeClassPerformance(new PalindromeAdvanced(), $iterations, $nonPalindrome);


function testPalindromeClassPerformance(PalindromeContract $palindrome, int $iterations, string $input) : void{
    $startTime = microtime(1);


    for($i = 0; $i < $iterations; $i++)
    {
        $palindrome->isPalindrome($input);
    }


    $spendTime = microtime(1) - $startTime;

    // Log result
    $className = get_class($palindrome);
    echo "{$className}: {$spendTime}ms \r\n";
}