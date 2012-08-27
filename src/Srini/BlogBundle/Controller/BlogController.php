<?php

namespace Srini\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Srini\BlogBundle\Entity\Blog;
use Srini\BlogBundle\Form\BlogType;

/**
 * Blog controller.
 *
 */
class BlogController extends Controller
{
    /**
     * Lists all Blog entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('SriniBlogBundle:Blog')->findAll();

        return $this->render('SriniBlogBundle:Blog:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Blog entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SriniBlogBundle:Blog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Blog entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SriniBlogBundle:Blog:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Blog entity.
     *
     */
    public function newAction()
    {
        $entity = new Blog();
        $form   = $this->createForm(new BlogType(), $entity);

        return $this->render('SriniBlogBundle:Blog:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Blog entity.
     *
     */
    public function createAction()
    {
        $entity  = new Blog();
        $request = $this->getRequest();
        $form    = $this->createForm(new BlogType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blog_show', array('id' => $entity->getId())));
            
        }

        return $this->render('SriniBlogBundle:Blog:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Blog entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SriniBlogBundle:Blog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Blog entity.');
        }

        $editForm = $this->createForm(new BlogType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SriniBlogBundle:Blog:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Blog entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SriniBlogBundle:Blog')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Blog entity.');
        }

        $editForm   = $this->createForm(new BlogType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blog_edit', array('id' => $id)));
        }

        return $this->render('SriniBlogBundle:Blog:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Blog entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('SriniBlogBundle:Blog')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Blog entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blog'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
