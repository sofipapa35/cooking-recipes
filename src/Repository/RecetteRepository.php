<?php

namespace App\Repository;

use App\Entity\Recette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recette>
 *
 * @method Recette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recette[]    findAll()
 * @method Recette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recette::class);
    }

    public function add(Recette $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Recette $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        } 
        
    }
        public function getRecetteRecent()
    {
        return $this->createQueryBuilder('r')
        ->orderBy('r.createdAt','DESC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult()
        ;
        }
        
        public function getRecetteNotation()
    {
        return $this->createQueryBuilder('re')
        ->orderBy('re.notation','DESC')
        ->setMaxResults(6)
        ->getQuery()
        ->getResult()
        ;
        } 
        public function searchRec($s)
    {
        return $this->createQueryBuilder('r')
        ->where('r.titre LIKE :terms')
        ->setParameter('terms', '%'.$s.'%')
        ->orderBy('r.titre', 'ASC')
        ->getQuery()
        ->getResult()
        ;
        }
        
        public function getOldNote($sId)
    {
        return $this->createQueryBuilder('r')
        ->andwhere('r.id = :val')
        ->setParameter('val', $sId)
        ->getQuery()
        ->getResult()
        ;
        }



//    /**
//     * @return Recette[] Returns an array of Recette objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Recette
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
