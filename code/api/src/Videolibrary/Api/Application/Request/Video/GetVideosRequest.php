<?php


namespace App\Videolibrary\Api\Application\Request\Video;


class GetVideosRequest
{
    private string $status;

    public function __construct(string $status)
    {
        $this->status = $status;
    }

    public function status(): string
    {
        return $this->status;
    }


}