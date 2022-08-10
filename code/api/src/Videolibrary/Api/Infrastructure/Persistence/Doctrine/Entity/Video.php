<?php

namespace App\Videolibrary\Api\Infrastructure\Persistence\Doctrine\Entity;

use App\Videolibrary\Api\Domain\Model\Status\Status;
use App\Videolibrary\Api\Domain\Model\Video\VideoId;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Videolibrary\Api\Domain\Model\Video\Video as VideoDomain;

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

    public static function fromDomain(VideoDomain $video): self
    {
        $subtitles = new ArrayCollection();

        if (!$video->subtitles()->isEmpty()) {
            foreach ($video->subtitles()->getCollection() as $subtitle) {
                $subtitles->add(Subtitle::fromDomain($subtitle));
            }
        }

        return new self(
            $video->id()->value(),
            $video->title(),
            $video->duration(),
            $video->status()->value(),
            $subtitles,
            $video->createdAt(),
            $video->updatedAt(),
            $video->image()
        );
    }

    public function toDomain(): VideoDomain
    {
        return VideoDomain::fromPrimitive(
            $this->id(),
            $this->title(),
            $this->duration(),
            $this->status(),
            $this->createdAt(),
            $this->updatedAt(),
            $this->image(),
        );
    }
}