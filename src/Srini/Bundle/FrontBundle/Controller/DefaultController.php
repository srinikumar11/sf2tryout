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
                $formData = $form->getData();
               $mailMessage = "<br />";
               $mailMessage .="<b>Name :</b>".$formData['name']."<br />";
               $mailMessage .="<b>Email :</b>".$formData['email']."<br />";
               $mailMessage .="<b>Name :</b>".$formData['message']."<br />";
                $mailer = $this->get('mailer');
                $message = \Swift_Message::newInstance(null,null,"text/html",null)
                        
                    ->setSubject('Hello Email')
                    ->setFrom('admin@srinivasank.com')
                    ->setTo('srinikumar11@gmail.com')
                    ->setBody($mailMessage)
                        
                ;
                $this->get('mailer')->send($message);
                $this->get('session')->getFlashBag()->add('notice', 'Message Sent');

                return new \Symfony\Component\HttpFoundation\RedirectResponse($this->generateUrl('_contact'));
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
       return $this->render('SriniFrontBundle:Default:about.html.twig');
    }
    
       public function showAction($id, $slug)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('SriniBlogBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('SriniBlogBundle:Comment')
                   ->getCommentsForBlog($blog->getId());

        return $this->render('SriniFrontBundle:Default:show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $comments
        ));
   }
    
    
}
