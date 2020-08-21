<?php


namespace Videolibrary\Api\Infrastructure\Ui\Http\Controller\Videos;


use Symfony\Component\HttpFoundation\JsonResponse;
use Videolibrary\Api\Domain\Model\Videos\Video;
use Videolibrary\Api\Domain\Model\Videos\VideoId;

class GetVideosController
{
    public function __invoke()
    {
        $video = new Video(
            new VideoId('123abc'),
            'Test title',
            '123'
        );

        return new JsonResponse([
            'status' => 'ok',
            'video' => [
                'id' => $video->id()->value(),
                'title' => $video->title(),
                'duration' => $video->duration(),
            ],
        ]);
    }
}