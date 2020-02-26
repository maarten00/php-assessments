<?php namespace Vevers\DijAssessments;

class FileOwners
{
    /**
     * Groups an associative array of files and respective owners ["Input.txt" => "Randy"] by owner
     * @param array $files
     * @return array
     */
    public function groupByOwners(array $files) : array
    {
        $filesGroupedByOwner = [];

        foreach($files as $fileName => $ownerName){
            // Make sure an array for the for the current ownerName is initialized
            $filesGroupedByOwner[$ownerName] =  $filesGroupedByOwner[$ownerName] ?? [];

            // Add file to results for current owner
            $filesGroupedByOwner[$ownerName][] = $fileName;
        }

        return $filesGroupedByOwner;
    }
}