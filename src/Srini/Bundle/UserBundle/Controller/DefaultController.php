<?php

namespace Srini\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SriniUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
