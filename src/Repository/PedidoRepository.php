<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;
use App\Entity\Pedido;

class PedidoRepository extends EntityRepository
{
    public function findPedidosAdmin()
    {
        return $this->createQueryBuilder('p')
            ->join('p.idUsuario','usuario')
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Usuario
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
