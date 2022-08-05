<?php


namespace App\Videolibrary\Api\Infrastructure\Persistence\InMemory\Repository;


use App\Videolibrary\Api\Domain\Model\Status\Status;
use App\Videolibrary\Api\Domain\Model\Video\Video;
use App\Videolibrary\Api\Domain\Model\Video\VideoCollection;
use App\Videolibrary\Api\Domain\Model\Video\VideoId;
use App\Videolibrary\Api\Domain\Model\Video\VideoRepository;

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

    public function insert(Video $video): void
    {
        // TODO: Implement insert() method.
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