<?php


namespace App\Videolibrary\Api\Domain\Model\Videos;


use App\Videolibrary\Api\Domain\Collection\ObjectCollection;

class VideoCollection extends ObjectCollection
{
    protected function className(): string
    {
        return Video::class;
    }

}