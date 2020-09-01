<?php


namespace Videolibrary\Api\Domain\Model\Videos;


interface VideoRepository
{
    public function findByStatus(Status $status): VideoCollection;
}