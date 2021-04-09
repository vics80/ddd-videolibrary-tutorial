<?php


namespace Videolibrary\Api\Domain\Model\Videos;


use Videolibrary\Api\Domain\Model\Subtitle\SubtitleCollection;

class Video
{
    private VideoId $id;
    private string $title;
    private int $duration;
    private Status $status;
    private \DateTimeImmutable $createdAt;
    private \DateTime $updatedAt;
    private SubtitleCollection $subtitles;

    public function __construct(VideoId $id, string $title, int $duration, Status $status, SubtitleCollection $subtitles)
    {
        $this->id = $id;
        $this->title = $title;
        $this->duration = $duration;
        $this->status = $status;
        $this->subtitles = $subtitles;
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTime();
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

    public function updatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    public function subtitles(): SubtitleCollection
    {
        return $this->subtitles;
    }

}