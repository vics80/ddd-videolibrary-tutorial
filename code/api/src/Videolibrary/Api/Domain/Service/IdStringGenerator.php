<?php


namespace Videolibrary\Api\Domain\Service;


interface IdStringGenerator
{
    public function generate(): string;
}