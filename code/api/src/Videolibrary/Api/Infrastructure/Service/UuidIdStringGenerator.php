<?php


namespace Videolibrary\Api\Infrastructure\Service;


use Ramsey\Uuid\Uuid;
use Videolibrary\Api\Domain\Service\IdStringGenerator;

class UuidIdStringGenerator implements IdStringGenerator
{
    public function generate(): string
    {
        return Uuid::uuid4();
    }

}