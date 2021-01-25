<?php


namespace Videolibrary\Api\Application\Command\Video;


use Videolibrary\Api\Application\Request\Video\CreateVideoRequest;
use Videolibrary\Api\Application\Response\Video\VideoResponse;
use Videolibrary\Api\Domain\Model\Videos\Status;
use Videolibrary\Api\Domain\Model\Videos\Video;
use Videolibrary\Api\Domain\Model\Videos\VideoId;
use Videolibrary\Api\Domain\Model\Videos\VideoRepository;
use Videolibrary\Api\Domain\Service\IdStringGenerator;

class CreateVideoHandler
{
    private VideoRepository $videoRepository;
    private IdStringGenerator $idStringGenerator;

    public function __construct(VideoRepository $videoRepository, IdStringGenerator $idStringGenerator)
    {
        $this->videoRepository = $videoRepository;
        $this->idStringGenerator = $idStringGenerator;
    }


    public function __invoke(CreateVideoRequest $createVideoRequest): VideoResponse
    {
        $video = new Video(
            new VideoId($this->idStringGenerator->generate()),
            $createVideoRequest->title(),
            $createVideoRequest->duration(),
            new Status($createVideoRequest->status())
        );

        $this->videoRepository->insert($video);

        return new VideoResponse($video);
    }
}