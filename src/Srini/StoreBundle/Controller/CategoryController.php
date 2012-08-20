<?php

namespace Srini\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Srini\StoreBundle\Entity\Category;

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
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('SriniStoreBundle:Category')->findAll();

        return $this->render('SriniStoreBundle:Category:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Category entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SriniStoreBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return $this->render('SriniStoreBundle:Category:show.html.twig', array(
            'entity'      => $entity,
        ));
    }

}
