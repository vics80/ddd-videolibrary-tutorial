<?php


namespace Videolibrary\Api\Domain\Model\Videos;


class Video
{
    private VideoId $id;
    private string $title;
    private int $duration;
    private Status $status;
    private \DateTimeImmutable $createdAt;
    private \DateTime $updatedAt;

    public function __construct(VideoId $id, string $title, int $duration, Status $status)
    {
        $this->id = $id;
        $this->title = $title;
        $this->duration = $duration;
        $this->status = $status;
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

}