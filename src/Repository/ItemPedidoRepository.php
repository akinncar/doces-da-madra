<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ItemPedidoRepository extends EntityRepository
{
    public function listItensPedido($id)
    {
        return $this->createQueryBuilder('i')
            ->addSelect('pedido')
            ->addSelect('produto')
            ->innerJoin('i.idPedido','pedido')
            ->innerJoin('pedido.idUsuario','usuario')
            ->innerJoin('i.idProduto','produto')
            ->orderBy('i.id', 'DESC')
            ->andWhere('i.idPedido = :pedidoId')
            ->setParameter('pedidoId', $id)
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
