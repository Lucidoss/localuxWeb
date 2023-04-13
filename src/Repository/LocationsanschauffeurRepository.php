<?php

namespace App\Repository;

use App\Entity\Locationsanschauffeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Locationsanschauffeur>
 *
 * @method Locationsanschauffeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Locationsanschauffeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Locationsanschauffeur[]    findAll()
 * @method Locationsanschauffeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocationsanschauffeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Locationsanschauffeur::class);
    }

    public function save(Locationsanschauffeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Locationsanschauffeur $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Locationsanschauffeur[] Returns an array of Locationsanschauffeur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Locationsanschauffeur
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
