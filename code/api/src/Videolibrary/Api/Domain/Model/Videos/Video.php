<?php


namespace Videolibrary\Api\Domain\Model\Videos;


class Video
{
    private VideoId $id;
    private string $title;
    private int $duration;

    public function __construct(VideoId $id, string $title, int $duration)
    {
        $this->id = $id;
        $this->title = $title;
        $this->duration = $duration;
    }

    public function id(): VideoId
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function duration(): int
    {
        return $this->duration;
    }


}