<?php


namespace App\Videolibrary\Api\Application\Command\Video;


use App\Videolibrary\Api\Application\Request\Video\CreateVideoRequest;
use App\Videolibrary\Api\Application\Response\Subtitle\SubtitleCollectionResponse;
use App\Videolibrary\Api\Application\Response\Video\VideoResponse;
use App\Videolibrary\Api\Domain\Model\Subtitle\Subtitle;
use App\Videolibrary\Api\Domain\Model\Subtitle\SubtitleCollection;
use App\Videolibrary\Api\Domain\Model\Subtitle\SubtitleId;
use App\Videolibrary\Api\Domain\Model\Status\Status;
use App\Videolibrary\Api\Domain\Model\Video\Video;
use App\Videolibrary\Api\Domain\Model\Video\VideoId;
use App\Videolibrary\Api\Domain\Model\Video\VideoRepository;
use App\Videolibrary\Api\Domain\Service\IdStringGenerator;

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
        $video = Video::create(
            new VideoId($this->idStringGenerator->generate()),
            $createVideoRequest->title(),
            $createVideoRequest->duration(),
            $createVideoRequest->image(),
            $this->buildSubtitleCollection($createVideoRequest->subtitles())
        );

        $this->videoRepository->insert($video);

        return new VideoResponse($video);
    }

    private function buildSubtitleCollection(array $subtitles): SubtitleCollection
    {
        $subtileCollection = SubtitleCollection::init();
        if (!empty($subtitles)) {
            foreach ($subtitles as $subtitle) {
                $subtileCollection->add(new Subtitle(
                    new SubtitleId($this->idStringGenerator->generate()),
                    $subtitle
                ));
            }
        }

        return $subtileCollection;
    }
}