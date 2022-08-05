<?php


namespace App\Videolibrary\Api\Infrastructure\Persistence\Doctrine\Repository;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

abstract class DoctrineRepository
{
    protected EntityRepository $repository;
    protected EntityManager $entityManager;
    protected string $table;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository($this->entityClassName());
        $this->table = $this->entityManager->getClassMetadata($this->entityClassName())->getTableName();
    }

    abstract protected function entityClassName(): string;
}