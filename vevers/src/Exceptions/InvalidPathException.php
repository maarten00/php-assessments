<?php namespace Vevers\DijAssessments\Exceptions;

use Exception;

class InvalidPathException extends Exception
{
    public static function create(string $reason, string $originalPath, string $command): self
    {
        return new static("Error while trying to CD '{$command}' against '{$originalPath}': {$reason}");
    }
}
