<?php


namespace App\Videolibrary\Api\Application\Request\Video;


class CreateVideoRequest
{
    public function __construct(
        private string $title,
        private int $duration,
        private string $status,
        private array $subtitles,
        private string $image,
    )
    {
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

    public function subtitles(): array
    {
        return $this->subtitles;
    }

    public function image(): string
    {
        return $this->image;
    }

}