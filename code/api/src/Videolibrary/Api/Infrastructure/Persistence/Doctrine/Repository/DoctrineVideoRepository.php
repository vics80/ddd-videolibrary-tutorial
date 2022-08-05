<?php

namespace App\Videolibrary\Api\Infrastructure\Persistence\Doctrine\Repository;

use App\Videolibrary\Api\Domain\Model\Status\Status;
use App\Videolibrary\Api\Domain\Model\Video\Video;
use App\Videolibrary\Api\Infrastructure\Persistence\Doctrine\Entity\Video as VideoEntity;
use App\Videolibrary\Api\Domain\Model\Video\VideoCollection;
use App\Videolibrary\Api\Domain\Model\Video\VideoRepository;

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
                $videoCollection->add($video->toDomain());
            }
        }

        return $videoCollection;
    }

    public function insert(Video $video): void
    {
        $this->entityManager->persist(
            VideoEntity::fromDomain($video)
        );

        $this->entityManager->flush();
    }
}