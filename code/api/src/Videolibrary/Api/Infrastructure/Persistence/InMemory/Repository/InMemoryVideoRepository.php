<?php


namespace Videolibrary\Api\Infrastructure\Persistence\InMemory\Repository;


use Videolibrary\Api\Domain\Model\Videos\Status;
use Videolibrary\Api\Domain\Model\Videos\Video;
use Videolibrary\Api\Domain\Model\Videos\VideoCollection;
use Videolibrary\Api\Domain\Model\Videos\VideoId;
use Videolibrary\Api\Domain\Model\Videos\VideoRepository;

class InMemoryVideoRepository implements VideoRepository
{
    private array $videos;

    public function __construct()
    {
        $this->videos[] = new Video(
            new VideoId('1'),
            'published video 1',
            120,
            new Status('published')
        );

        $this->videos[] = new Video(
            new VideoId('2'),
            'published video 2',
            120,
            new Status('published')
        );

        $this->videos[] = new Video(
            new VideoId('3'),
            'pending video 1',
            120,
            new Status('pending')
        );

        $this->videos[] = new Video(
            new VideoId('4'),
            'pending video 2',
            120,
            new Status('pending')
        );

        $this->videos[] = new Video(
            new VideoId('5'),
            'removed video 1',
            120,
            new Status('removed')
        );
    }

    public function findByStatus(Status $status): VideoCollection
    {
        $videoCollection = new VideoCollection();

        array_map(function ($video) use ($videoCollection, $status) {
            if ($video->status()->equals($status)) {
                $videoCollection->add($video);
            }
        }, $this->videos);

        return $videoCollection;
    }
}