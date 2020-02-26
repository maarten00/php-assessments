<?php namespace Vevers\DijAssessments;

use Vevers\DijAssessments\Exceptions\InvalidPathException;

class Path
{
    protected $currentPath;
    protected $delimiter = "/";

    function __construct(string $path)
    {
        $this->currentPath = $path;
    }

    public function getCurrentPath(): string
    {
        return $this->currentPath;
    }

    public function setCurrentPath(string $path): void
    {
        $this->currentPath = $path;
    }

    /**
     * @param string $newPath
     * @throws InvalidPathException
     */
    public function cd(string $newPath): void
    {
        $currentPathSections = $this->pathToArray($this->getCurrentPath());

        // Reset current path if $newPath is absolute
        if ($this->cdCommandIsAbsolute($newPath)) {
            $currentPathSections = [];
        }

        // Iterate through all elements of $newPath
        $newPathSections = $this->pathToArray($newPath);

        foreach ($newPathSections as $newPathSection) {

            // Do nothing for .
            if ($newPathSection == ".") {
                continue;
            }

            // Go up one folder for ..
            if ($newPathSection == "..") {
                // Throw an invalid path error if we can't go up
                if (count($currentPathSections) == 0) throw InvalidPathException::create("Invalid path", $this->getCurrentPath(), $newPath);

                array_pop($currentPathSections);

                continue;
            }

            // Add normal folder to the the current paths sections
            $currentPathSections[] = $newPathSection;
        }


        // Convert array with sections to string
        $this->setCurrentPath($this->arrayToPath($currentPathSections));
    }

    protected function cdCommandIsAbsolute($newPath)
    {
        return $newPath[0] == $this->delimiter;
    }

    protected function pathToArray(string $path): array
    {
        // Remove prefixing delimiter
        $path = trim($path, "/");

        // Simply return an empty array for empty paths (note: explode() turns these into [""])
        if ($path == "") return [];

        // Explode folders to array
        return explode($this->delimiter, $path);
    }

    protected function arrayToPath(array $pathSections): string
    {
        // Implode sections to a string
        $path = implode($this->delimiter, $pathSections);
        // Add first delimiter as prefix
        return $this->delimiter . $path;
    }


}