<?php


namespace App\Videolibrary\Api\Domain\Model\Video;


use App\Videolibrary\Api\Domain\Model\Status\Status;

interface VideoRepository
{
    public function findByStatus(Status $status): VideoCollection;
    public function insert(Video $video): void;
}