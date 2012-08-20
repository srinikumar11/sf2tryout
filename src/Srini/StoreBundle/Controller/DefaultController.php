<?php

namespace Srini\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Srini\StoreBundle\Entity\Category;
use Srini\StoreBundle\Entity\Product;

use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('SriniStoreBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function createAction()
    {
        $category = new Category();
        $category->setName("Category 1");
        
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');
        $product->setCategory($category);
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($product);
        $em->persist($category);
        $em->flush();
        return new Response(
'Created product id: '.$product->getId().' and category id:
'.$category->getId()
);


    }
    
    public function showAction($id)
    {
        $product = $this->getDoctrine()

->getRepository('SriniStoreBundle:Product')

->find($id);
        if(!$product)
        {
            throw $this->createNotFoundException('No product found for id '.$id);
        }
        print_r($product);
        return new Response (""); 
    }
}
