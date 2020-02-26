<?php declare(strict_types=1);
namespace Tests;

use PHPUnit\Framework\TestCase;
use Vevers\DijAssessments\FileOwners;

final class FileOwnersTest extends TestCase
{
    /** @var FileOwners */
    protected $fileOwners;

    protected function setUp(): void
    {
        $this->fileOwners = new FileOwners();
    }
    
    /** @test */
    public function it_groups_by_owners()
    {
        $input = [
            "Input.txt" => "Randy",
            "Code.py" => "Stan",
            "Output.txt" => "Randy"
        ];

        $result = $this->fileOwners->groupByOwners($input);

        $expectedResult = [
            "Randy" => [
                "Input.txt",
                "Output.txt"
            ],
            "Stan" => [
                "Code.py"
            ]
        ];

        $this->assertEquals($expectedResult, $result);
    }

    /** @test */
    public function it_supports_empty_arrays()
    {
        $result = $this->fileOwners->groupByOwners([]);

        $this->assertEquals([], $result);
    }


}