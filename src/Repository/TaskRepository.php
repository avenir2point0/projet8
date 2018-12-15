<?php

namespace App\Repository;

use App\Entity\Task;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Task|null find($id, $lockMode = null, $lockVersion = null)
 * @method Task|null findOneBy(array $criteria, array $orderBy = null)
 * @method Task[]    findAll()
 * @method Task[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TaskRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Task::class);
    }

    public function findDoneTasks()
    {
        return $this->createQueryBuilder('task')
            ->andWhere('task.isDone = :isDone')
            ->setParameter('isDone', true)
            ->orderBy('task.createdAt', 'DESC')
            ->getQuery()
            ->execute();
    }

    public function findUndoneTasks()
    {
        return $this->createQueryBuilder('task')
            ->andWhere('task.isDone = :isDone')
            ->setParameter('isDone', false)
            ->orderBy('task.createdAt', 'DESC')
            ->getQuery()
            ->execute();
    }
}
