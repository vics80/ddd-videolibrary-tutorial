<?php


namespace App\Videolibrary\Api\Domain\Model\Subtitle;


use App\Videolibrary\Api\Domain\Collection\ObjectCollection;

class SubtitleCollection extends ObjectCollection
{
    protected function className(): string
    {
        return Subtitle::class;
    }

}