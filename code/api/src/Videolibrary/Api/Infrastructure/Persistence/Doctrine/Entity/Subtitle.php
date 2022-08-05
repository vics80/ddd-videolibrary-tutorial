<?php


namespace App\Videolibrary\Api\Infrastructure\Persistence\Doctrine\Entity;

use App\Videolibrary\Api\Domain\Model\Subtitle\Subtitle as SubtitleDomain;

class Subtitle
{
    private string $id;
    private string $language;
    private Video $video;

    public function __construct(string $id, string $language)
    {
        $this->id = $id;
        $this->language = $language;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function language(): string
    {
        return $this->language;
    }

    public function video(): Video
    {
        return $this->video;
    }

    public function setVideo(Video $video): void
    {
        $this->video = $video;
    }

    public static function fromDomain(SubtitleDomain $subtitle): self
    {
        return new self(
            $subtitle->id()->value(),
            $subtitle->language()
        );
    }
}