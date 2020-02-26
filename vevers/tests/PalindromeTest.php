<?php declare(strict_types=1);
namespace Tests;

use PHPUnit\Framework\TestCase;
use Vevers\DijAssessments\Palindrome;

class PalindromeTest extends TestCase
{
    /** @var Palindrome */
    protected $palindrome;

    protected function setUp(): void
    {
        $this->palindrome = new Palindrome();
    }

    /**
     * @test
     * @dataProvider palindromeProvider
     * @param string $palindrome
     */
    public function it_returns_true_for_a_palindromes(string $palindrome)
    {
        $result = $this->palindrome->isPalindrome($palindrome);

        $this->assertSame(true, $result);
    }

    public function palindromeProvider()
    {
        return [
            ["Deleveled"],
            ["Racecar"],
            ["Radar"],
            ["Level"],
        ];
    }

    /**
     * @test
     * @dataProvider nonPalindromeProvider
     * @param string $nonPalindrome
     */
    public function it_returns_false_for_a_non_palindrome(string $nonPalindrome)
    {
        $result = $this->palindrome->isPalindrome($nonPalindrome);

        $this->assertSame(false, $result);
    }

    public function nonPalindromeProvider()
    {
        return [
            ["Laravel"],
            ["Code"],
            ["Unit"],
            ["Testing"],
        ];
    }

    /**
     * @test
     * @dataProvider smallInputsProvider
     * @param string $nonPalindrome
     */
    public function it_returns_false_for_inputs_with_length_1_or_shorter(string $nonPalindrome)
    {
        $result = $this->palindrome->isPalindrome($nonPalindrome);

        $this->assertSame(false, $result);
    }

    public function smallInputsProvider()
    {
        return [
            ["a"],
            [""],
        ];
    }


}