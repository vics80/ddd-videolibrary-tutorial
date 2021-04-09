<?php


namespace Videolibrary\Api\Domain\Model\Subtitle;


use Videolibrary\Api\Domain\Model\Videos\Video;

class Subtitle
{
    private SubtitleId $id;
    private string $language;
    private Video $video;

    public function __construct(SubtitleId $id, string $language)
    {
        $this->id = $id;
        $this->language = $language;
    }

    public function id(): SubtitleId
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

}