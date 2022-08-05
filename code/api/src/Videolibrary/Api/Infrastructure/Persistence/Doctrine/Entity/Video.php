<?php

namespace App\Videolibrary\Api\Infrastructure\Persistence\Doctrine\Entity;

use Doctrine\Common\Collections\Collection;

class Video
{
    public function __construct(
        private string $id,
        private string $title,
        private int $duration,
        private string $status,
        private ?Collection $subtitles,
        private \DateTimeInterface $createdAt,
        private ?\DateTimeInterface $updatedAt,
        private string $image,
    )
    {
    }

    public function id(): string
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

    public function status(): string
    {
        return $this->status;
    }

    public function createdAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function subtitles(): ?Collection
    {
        return $this->subtitles;
    }

    public function image(): string
    {
        return $this->image;
    }

    public function addSubtitle(Subtitle $subtitle)
    {
        $subtitle->setVideo($this);
        $this->subtitles->add($subtitle);
    }
}