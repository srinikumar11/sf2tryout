<?php
namespace Srini\StoreBundle\Repository;
use Doctrine\ORM\EntityRepository;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ProductRepository extends EntityRepository
{
public function findAllOrderedByName()
{
return $this->getEntityManager()
->createQuery('SELECT p FROM AcmeStoreBundle:Product p ORDER BY p.name ASC')
->getResult();
}
}

?>
