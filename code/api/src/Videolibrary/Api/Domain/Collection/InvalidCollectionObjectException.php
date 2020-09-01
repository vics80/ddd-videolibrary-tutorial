<?php


namespace Videolibrary\Api\Domain\Collection;


class InvalidCollectionObjectException extends \Exception
{
    public function __construct($actual, string $expected)
    {
        parent::__construct(
            sprintf('"%s" is not a valid object for collection. Expected "%s"', get_class($actual), $expected)
        );
    }
}