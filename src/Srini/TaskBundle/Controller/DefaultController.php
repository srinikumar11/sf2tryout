<?php

namespace Srini\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Srini\TaskBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Srini\TaskBundle\Form\Type\TaskType;

class DefaultController extends Controller {

    public function indexAction($name) {
        return $this->render('SriniTaskBundle:Default:index.html.twig', array('name' => $name));
    }

    public function newAction(Request $request) {
// create a task and give it some dummy data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));
        $form = $this->createForm(new TaskType(), $task);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                // perform some action, such as saving the task to the database
                $this->get('session')->setFlash('notice', 'Added Successfully');
                return $this->redirect($this->generateUrl('task_success'));
            }
        }

        return $this->render('SriniTaskBundle:Default:new.html.twig', array(
                    'form' => $form->createView(),
                ));
    }
    public function showAction(){
        return $this->render('SriniTaskBundle:Default:show.html.twig');
    }

}
