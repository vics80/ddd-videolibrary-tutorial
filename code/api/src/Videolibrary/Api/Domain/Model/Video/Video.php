<?php


namespace App\Videolibrary\Api\Domain\Model\Video;


use App\Videolibrary\Api\Domain\Model\Status\Status;
use App\Videolibrary\Api\Domain\Model\Subtitle\SubtitleCollection;

class Video
{
    private VideoId $id;
    private string $title;
    private int $duration;
    private Status $status;
    private \DateTimeInterface $createdAt;
    private ?\DateTimeInterface $updatedAt;
    private ?SubtitleCollection $subtitles;
    private string $image;

    private function __construct(
    )
    {
    }

    public static function create(
        VideoId $id,
        string $title,
        int $duration,
        string $image,
        SubtitleCollection $subtitles,
    ): self
    {
        $video = new Video();

        $video->id = $id;
        $video->title = $title;
        $video->duration = $duration;
        $video->status = Status::makePublished();
        $video->createdAt = new \DateTimeImmutable();
        $video->image = $image;
        $video->subtitles = $subtitles;
        $video->updatedAt = null;

        return $video;
    }

    public static function fromPrimitive(
        string $id,
        string $title,
        int $duration,
        string $status,
        \DateTimeInterface $createdAt,
        ?\DateTimeInterface $updatedAt,
        string $image,
    ): self
    {
        $video = new Video();

        $video->id = new VideoId($id);
        $video->title = $title;
        $video->duration = $duration;
        $video->status = new Status($status);
        $video->createdAt = $createdAt;
        $video->updatedAt = $updatedAt;
        $video->image = $image;
        $video->subtitles = null;

        return $video;
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