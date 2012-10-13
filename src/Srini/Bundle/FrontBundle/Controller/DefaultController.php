<?php

namespace Srini\Bundle\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Srini\Bundle\FrontBundle\Form\ContactType;


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SriniFrontBundle:Default:index.html.twig', array('name' => $name));
    }
    
    
     public function contactAction()
    {
        $form = $this->get('form.factory')->create(new ContactType());

        $request = $this->get('request');
        if ('POST' == $request->getMethod()) {
            $form->bindRequest($request);
            if ($form->isValid()) {
               
                $mailer = $this->get('mailer');
                $message = \Swift_Message::newInstance()
                    ->setSubject('Hello Email')
                    ->setFrom('admin@srinivasank.com')
                    ->setTo('srinikumar11@gmail.com')
                    ->setBody("This is a sample")
                ;
                $this->get('mailer')->send($message);
                $this->get('session')->setFlash('notice', 'Message sent!');

                return new RedirectResponse($this->generateUrl('_contact'));
            }
        }

//        return array('form' => $form->createView());
       return $this->render('SriniFrontBundle:Default:contact.html.twig', array('form' => $form->createView()));
    }
    
    
     public function blogAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SriniBlogBundle:Blog')->findAll();

        return $this->render('SriniFrontBundle:Default:blog.html.twig', array(
            'entities' => $entities,
        ));
    }
    
     public function aboutAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SriniBlogBundle:Blog')->findAll();

        return $this->render('SriniFrontBundle:Default:blog.html.twig', array(
            'entities' => $entities,
        ));
    }
}
