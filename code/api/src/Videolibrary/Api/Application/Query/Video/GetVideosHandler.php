<?php


namespace App\Videolibrary\Api\Application\Query\Video;


use App\Videolibrary\Api\Application\Request\Video\GetVideosRequest;
use App\Videolibrary\Api\Application\Response\Video\VideoCollectionResponse;
use App\Videolibrary\Api\Domain\Model\Status\Status;
use App\Videolibrary\Api\Domain\Model\Video\VideoRepository;

class GetVideosHandler
{
    private VideoRepository $videoRepository;

    public function __construct(VideoRepository $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }

    public function __invoke(GetVideosRequest $getVideosRequest): VideoCollectionResponse
    {
        $videos = $this->videoRepository->findByStatus(
            new Status($getVideosRequest->status())
        );

        return new VideoCollectionResponse($videos);
    }
}