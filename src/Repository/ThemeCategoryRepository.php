<?php

/*
 * This file is part of aakb/itstyr.
 *
 * (c) 2018–2019 ITK Development
 *
 * This source file is subject to the MIT license.
 */

namespace App\Repository;

use App\Entity\ThemeCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ThemeCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ThemeCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ThemeCategory[]    findAll()
 * @method ThemeCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThemeCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ThemeCategory::class);
    }

//    /**
//     * @return ThemeCategory[] Returns an array of ThemeCategory objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ThemeCategory
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
