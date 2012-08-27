<?php

namespace Srini\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Srini\BlogBundle\Entity\Document;

class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('SriniBlogBundle:Default:index.html.twig', array('name' => $name));
    }
    /**
 * @Template()
 */
    public function uploadAction()
{
    $document = new Document();
    $form = $this->createFormBuilder($document)
        ->add('name')
//            ->add('path')
        ->add('file')
        ->getForm()
    ;

    if ($this->getRequest()->getMethod() === 'POST') {
        $form->bindRequest($this->getRequest());
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
//        $document->upload();
            $em->persist($document);
            $em->flush();

            //$this->redirect($this->generateUrl(blog));
        }
    }

    return array('form' => $form->createView());
}
}
