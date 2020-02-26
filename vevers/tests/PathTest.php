<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use Vevers\DijAssessments\Exceptions\InvalidPathException;
use \Vevers\DijAssessments\Path;

final class PathTest extends TestCase
{

    /**
     * @test
     * @dataProvider openingSubFolderProvider
     * @param string $initialFolder
     * @param string $command
     * @param string $expectedResult
     * @throws InvalidPathException
     */
    public function it_can_go_to_a_sub_folder(string $initialFolder, string $command, string $expectedResult)
    {
        $result = $this->runCdCommand($initialFolder, $command);

        $this->assertEquals($expectedResult, $result);
    }

    public function openingSubFolderProvider()
    {
        return [
            ["/a", "b", "/a/b"],
            ["/a", "b/c", "/a/b/c"],
            ["/", "a", "/a"],
        ];
    }

    /**
     * @test
     * @dataProvider settingAbsolutePathsProvider
     * @param string $initialFolder
     * @param string $command
     * @param string $expectedResult
     * @throws InvalidPathException
     */
    public function it_supports_absolute_paths(string $initialFolder, string $command, string $expectedResult)
    {
        $result = $this->runCdCommand($initialFolder, $command);

        $this->assertEquals($expectedResult, $result);
    }

    public function settingAbsolutePathsProvider()
    {
        return [
            ["/a", "/b", "/b"],
            ["/a", "/b/c", "/b/c"],
            ["/", "/a", "/a"],
            ["/a/b", "/a", "/a"],
        ];
    }


    /**
     * @test
     * @dataProvider goingUpProvider
     * @param string $initialFolder
     * @param string $command
     * @param string $expectedResult
     * @throws InvalidPathException
     */
    public function it_supports_going_up_a_directory(string $initialFolder, string $command, string $expectedResult)
    {
        $result = $this->runCdCommand($initialFolder, $command);

        $this->assertEquals($expectedResult, $result);
    }

    public function goingUpProvider()
    {
        return [
            ["/a/b/c/d", "../", "/a/b/c"],
            ["/a", "../", "/"],
            ["/a/b/c/d", "../e", "/a/b/c/e"],
        ];
    }

    /**
     * @param string $initialFolder
     * @param string $command
     * @return string
     * @throws InvalidPathException
     */
    protected function runCdCommand(string $initialFolder, string $command): string
    {
        $path = new Path($initialFolder);
        $path->cd($command);

        $result = $path->getCurrentPath();
        return $result;
    }

    /**
     * @test
     * @dataProvider invalidPathsProvider
     * @param string $initialFolder
     * @param string $command
     * @throws InvalidPathException
     */
    public function it_throws_an_exception_for_invalid_paths(string $initialFolder, string $command)
    {
        $this->expectException(InvalidPathException::class);

        $result = $this->runCdCommand($initialFolder, $command);
    }

    public function invalidPathsProvider()
    {
        return [
            ["/a", "../../"],
            ["/", "../"],
            ["/a/b", "../../../"]
        ];
    }
}