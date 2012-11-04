<?php


namespace Srini\Bundle\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Srini\Bundle\BlogBundle\Entity\Category as Category;

class BlogFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName('Symfony 2 Relaeased');
        $manager->persist($category1);
        
        
        $category2 = new Category();
        $category2->setName('Symfony 2.1.0 Relaeased');
        $manager->persist($category2);
        
        $category3 = new Category();
        $category3->setName('Symfony 2.1.1 Relaeased');
        $manager->persist($category3);
        
        $category4 = new Category();
        $category4->setName('Symfony 2.1.2 Relaeased');
        $manager->persist($category4);
        
        $category5 = new Category();
        $category5->setName('Symfony 2.1.3 Relaeased');
        $manager->persist($category5);

        $manager->flush();

        $this->addReference('category-1', $category1);
        $this->addReference('category-2', $category2);
        $this->addReference('category-3', $category3);
        $this->addReference('category-4', $category4);
        $this->addReference('category-5', $category5);
    }
    
    public function getOrder()
    {
        return 1;
    }

}
