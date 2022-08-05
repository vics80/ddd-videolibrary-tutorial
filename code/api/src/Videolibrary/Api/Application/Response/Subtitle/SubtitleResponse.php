<?php

namespace App\Videolibrary\Api\Application\Response\Subtitle;


use App\Videolibrary\Api\Domain\Model\Subtitle\Subtitle;

class SubtitleResponse
{
    private string $id;
    private string $language;

    public function __construct(Subtitle $subtitle)
    {
        $this->id = $subtitle->id()->value();
        $this->language = $subtitle->language();
    }

    public function id(): string
    {
        return $this->id;
    }

    public function language(): string
    {
        return $this->language;
    }

    public function toArray()
    {
        return [
            'id' => $this->id(),
            'language' => $this->language(),
        ];
    }
}