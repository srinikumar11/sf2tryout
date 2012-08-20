<?php

namespace Srini\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    
    public function indexAction()
    {
        $first_name =  $this->getRequest()->get('first_name');
        $last_name =   $this->getRequest()->get('last_name');
        $color =   $this->getRequest()->get('color');
        return $this->render('SriniBlogBundle:Default:index.html.twig', array('name' => $first_name." ". $last_name." ".$color));
    }
    
    public function welcomeAction($slug)
    {
         return new Response('<html><body>Welcome '.$slug.'!</body></html>');
    }
}
