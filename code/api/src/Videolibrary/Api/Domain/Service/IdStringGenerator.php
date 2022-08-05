<?php


namespace App\Videolibrary\Api\Domain\Service;


interface IdStringGenerator
{
    public function generate(): string;
}