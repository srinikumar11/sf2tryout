<?php

namespace Srini\Bundle\JobeetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Srini\Bundle\JobeetBundle\Entity\Job;
use Srini\Bundle\JobeetBundle\Form\JobType;

/**
 * Job controller.
 *
 */
class JobController extends Controller
{
    /**
     * Lists all Job entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $categories = $em->getRepository('SriniJobeetBundle:Category')->getWithJobs();

        foreach($categories as $category)
        {
            $category->setActiveJobs($em->getRepository('SriniJobeetBundle:Job')->getActiveJobs($category->getId(), $this->container->getParameter('max_jobs_on_homepage')));
            $category->setMoreJobs($em->getRepository('SriniJobeetBundle:Job')->countActiveJobs($category->getId()) - $this->container->getParameter('max_jobs_on_homepage'));
        }

        return $this->render('SriniJobeetBundle:Job:index.html.twig', array(
            'categories' => $categories
        ));
    }

    /**
     * Finds and displays a Job entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SriniJobeetBundle:Job')->getActiveJob($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Job entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SriniJobeetBundle:Job:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to create a new Job entity.
     *
     */
    public function newAction()
    {
        $entity = new Job();
        $form   = $this->createForm(new JobType(), $entity);

        return $this->render('SriniJobeetBundle:Job:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Job entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Job();
        $form = $this->createForm(new JobType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
           
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('job_preview', array(
            'company' => $entity->getCompanySlug(),
            'location' => $entity->getLocationSlug(),
            'token' => $entity->getToken(),
            'position' => $entity->getPositionSlug()
            )));
        }

        return $this->render('SriniJobeetBundle:Job:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Job entity.
     *
     */
    public function editAction($token)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SriniJobeetBundle:Job')->findOneByToken($token);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Job entity.');
        }
        
        if ($entity->getIsActivated() && false === $this->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createNotFoundException('Job is activated and cannot be edited.');
        }

        $editForm = $this->createForm(new JobType(), $entity);
        $deleteForm = $this->createDeleteForm($token);

        return $this->render('SriniJobeetBundle:Job:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Job entity.
     *
     */
    public function updateAction(Request $request, $token)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SriniJobeetBundle:Job')->findOneByToken($token);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Job entity.');
        }

        $deleteForm = $this->createDeleteForm($token);
        $editForm = $this->createForm(new JobType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('job_preview', array(
            'company' => $entity->getCompanySlug(),
            'location' => $entity->getLocationSlug(),
            'token' => $entity->getToken(),
            'position' => $entity->getPositionSlug()
            )));
        }

        return $this->render('SriniJobeetBundle:Job:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Job entity.
     *
     */
    public function deleteAction(Request $request, $token)
    {
        $form = $this->createDeleteForm($token);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SriniJobeetBundle:Job')->find($token);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Job entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('job'));
    }

    private function createDeleteForm($token)
    {
        return $this->createFormBuilder(array('token' => $token))
            ->add('token', 'hidden')
            ->getForm()
        ;
    }
    
    public function previewAction($token)
{
  $em = $this->getDoctrine()->getEntityManager();
 
  $entity = $em->getRepository('SriniJobeetBundle:Job')->findOneByToken($token);
 
  if (!$entity) {
    throw $this->createNotFoundException('Unable to find Job entity.');
  }
 
  $deleteForm = $this->createDeleteForm($entity->getId());
  $publishForm = $this->createPublishForm($entity->getToken());
  $extendForm = $this->createExtendForm($entity->getToken());
 
  return $this->render('SriniJobeetBundle:Job:show.html.twig', array(
    'entity'      => $entity,
    'delete_form' => $deleteForm->createView(),
      'publish_form' => $publishForm->createView(),
      'extend_form' => $extendForm->createView(),
  ));
}

public function publishAction($token)
{
  $form = $this->createPublishForm($token);
  $request = $this->getRequest();
 
  $form->bindRequest($request);
 
  if ($form->isValid()) {
    $em = $this->getDoctrine()->getEntityManager();
    $entity = $em->getRepository('SriniJobeetBundle:Job')->findOneByToken($token);
 
    if (!$entity) {
      throw $this->createNotFoundException('Unable to find Job entity.');
    }
 
    $entity->publish();
    $em->persist($entity);
    $em->flush();
 
    $this->get('session')->setFlash('notice', 'Your job is now online for 30 days.');
  }
 
  return $this->redirect($this->generateUrl('job_preview', array(
    'company' => $entity->getCompanySlug(),
    'location' => $entity->getLocationSlug(),
    'token' => $entity->getToken(),
    'position' => $entity->getPositionSlug()
  )));
}

private function createPublishForm($token)
{
  return $this->createFormBuilder(array('token' => $token))
    ->add('token', 'hidden')
    ->getForm()
  ;
}

public function extendAction($token)
{
  $form = $this->createExtendForm($token);
  $request = $this->getRequest();
 
  $form->bindRequest($request);
 
  if ($form->isValid()) {
    $em = $this->getDoctrine()->getEntityManager();
    $entity = $em->getRepository('SriniJobeetBundle:Job')->findOneByToken($token);
 
    if (!$entity) {
      throw $this->createNotFoundException('Unable to find Job entity.');
    }
 
    if (!$entity->extend()) {
      throw $this->createNotFoundException('Unable to find extend the Job.');
    }
 
    $em->persist($entity);
    $em->flush();
 
    $this->get('session')->setFlash('notice', sprintf('Your job validity has been extended until %s.', $entity->getExpiresAt()->format('m/d/Y')));
  }
 
  return $this->redirect($this->generateUrl('job_preview', array(
    'company' => $entity->getCompanySlug(),
    'location' => $entity->getLocationSlug(),
    'token' => $entity->getToken(),
    'position' => $entity->getPositionSlug()
  )));
}
 
private function createExtendForm($token)
{
  return $this->createFormBuilder(array('token' => $token))
    ->add('token', 'hidden')
    ->getForm()
  ;
}
}
