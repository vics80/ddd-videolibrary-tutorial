<?php


namespace App\Videolibrary\Api\Domain\Model\Videos;


use App\Videolibrary\Api\Domain\Model\Subtitle\SubtitleCollection;

class Video
{
    public function __construct(
        private VideoId $id,
        private string $title,
        private int $duration,
        private Status $status,
        private \DateTimeInterface $createdAt,
        private ?\DateTimeInterface $updatedAt,
        private ?SubtitleCollection $subtitles,
        private string $image,
    )
    {
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

    public function status(): Status
    {
        return $this->status;
    }

    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function subtitles(): ?SubtitleCollection
    {
        return $this->subtitles;
    }

    public function image(): string
    {
        return $this->image;
    }

}