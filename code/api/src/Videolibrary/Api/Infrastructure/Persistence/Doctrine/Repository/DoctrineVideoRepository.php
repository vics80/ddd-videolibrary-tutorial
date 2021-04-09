<?php

namespace Videolibrary\Api\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Videolibrary\Api\Domain\Model\Subtitle\Subtitle;
use Videolibrary\Api\Infrastructure\Persistence\Doctrine\Entity\Subtitle as SubtitleEntity;
use Videolibrary\Api\Domain\Model\Videos\Status;
use Videolibrary\Api\Domain\Model\Videos\Video;
use Videolibrary\Api\Domain\Model\Videos\VideoId;
use Videolibrary\Api\Infrastructure\Persistence\Doctrine\Entity\Video as VideoEntity;
use Videolibrary\Api\Domain\Model\Videos\VideoCollection;
use Videolibrary\Api\Domain\Model\Videos\VideoRepository;

class DoctrineVideoRepository extends DoctrineRepository implements VideoRepository
{
    protected function entityClassName(): string
    {
        return VideoEntity::class;
    }

    public function findByStatus(Status $status): VideoCollection
    {
        $videos = $this->repository->findBy([
            'status' => $status->value()
        ]);
        
        $videoCollection = VideoCollection::init();

        if (!empty($videos)) {
            foreach ($videos as $video) {
                $videoCollection->add($this->toDomain($video));
            }
        }

        return $videoCollection;
    }

    public function insert(Video $video): void
    {
        $this->entityManager->persist($this->toInfrastructure($video));
        $this->entityManager->flush();
    }

    private function toInfrastructure(Video $video): VideoEntity
    {
        $videoEntity = new VideoEntity(
            $video->id()->value(),
            $video->title(),
            $video->duration(),
            $video->status()->value(),
            new ArrayCollection(),
            $video->createdAt(),
            $video->updatedAt()
        );

        foreach ($video->subtitles()->getCollection() as $subtitle) {
            $videoEntity->addSubtitle($this->subtitleToInfrastructure($subtitle));
        }

        return $videoEntity;
    }

    private function subtitleToInfrastructure(Subtitle $subtitle): SubtitleEntity
    {
        return new SubtitleEntity(
            $subtitle->id()->value(),
            $subtitle->language()
        );
    }

    private function toDomain(VideoEntity $video): Video
    {
        return new Video(
            new VideoId($video->id()),
            $video->title(),
            $video->duration(),
            new Status($video->status()),
            $video->createdAt(),
            $video->updatedAt()
        );
    }
}