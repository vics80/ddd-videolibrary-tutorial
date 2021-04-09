<?php


namespace Videolibrary\Api\Domain\Model\Subtitle;


use Videolibrary\Api\Domain\Collection\ObjectCollection;

class SubtitleCollection extends ObjectCollection
{
    protected function className(): string
    {
        return Subtitle::class;
    }

}