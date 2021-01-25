<?php


namespace Videolibrary\Api\Application\Request\Video;


class CreateVideoRequest
{
    private string $title;
    private int $duration;
    private string $status;

    public function __construct(string $title, int $duration, string $status)
    {
        $this->title = $title;
        $this->duration = $duration;
        $this->status = $status;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function duration(): int
    {
        return $this->duration;
    }

    public function status(): string
    {
        return $this->status;
    }


}