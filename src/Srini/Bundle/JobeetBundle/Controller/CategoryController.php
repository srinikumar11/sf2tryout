<?php

namespace Srini\Bundle\JobeetBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Srini\Bundle\JobeetBundle\Entity\Category;
use Srini\Bundle\JobeetBundle\Form\CategoryType;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller
{
    /**
     * Lists all Category entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('SriniJobeetBundle:Category')->findAll();

        return $this->render('SriniJobeetBundle:Category:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Finds and displays a Category entity.
     *
     */
    public function showAction($slug, $page)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $category = $em->getRepository('SriniJobeetBundle:Category')->findOneBySlug($slug);

        if (!$category) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $total_jobs = $em->getRepository('SriniJobeetBundle:Job')->countActiveJobs($category->getId());
        $jobs_per_page = $this->container->getParameter('max_jobs_on_category');
        $last_page = ceil($total_jobs / $jobs_per_page);
        $previous_page = $page > 1 ? $page - 1 : 1;
        $next_page = $page < $last_page ? $page + 1 : $last_page;

        $category->setActiveJobs($em->getRepository('SriniJobeetBundle:Job')->getActiveJobs($category->getId(), $jobs_per_page, ($page - 1) * $jobs_per_page));

        return $this->render('SriniJobeetBundle:Category:show.html.twig', array(
            'category' => $category,
            'last_page' => $last_page,
            'previous_page' => $previous_page,
            'current_page' => $page,
            'next_page' => $next_page,
            'total_jobs' => $total_jobs
        ));    
  
  }

    /**
     * Displays a form to create a new Category entity.
     *
     */
    public function newAction()
    {
        $entity = new Category();
        $form   = $this->createForm(new CategoryType(), $entity);

        return $this->render('SriniJobeetBundle:Category:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a new Category entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Category();
        $form = $this->createForm(new CategoryType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('category_show', array('id' => $entity->getId())));
        }

        return $this->render('SriniJobeetBundle:Category:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Category entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SriniJobeetBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $editForm = $this->createForm(new CategoryType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SriniJobeetBundle:Category:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Category entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SriniJobeetBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CategoryType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('category_edit', array('id' => $id)));
        }

        return $this->render('SriniJobeetBundle:Category:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Category entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SriniJobeetBundle:Category')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Category entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('category'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
