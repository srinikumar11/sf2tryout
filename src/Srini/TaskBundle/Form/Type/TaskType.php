<?php

namespace Srini\TaskBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TaskType extends AbstractType {

    public function buildForm(FormBuilder $builder, array $option) {
        $builder->add('task')
                ->add('dueDate', 'date', array('widget' => 'single_text'));
    }

    public function getName() {
        return 'srini_taskbundle_tasktype';
    }

    public function getDefaultOptions(array $options) {

        return array(
            'data_class' => 'Srini\TaskBundle\Entity\Task',
        );
    }

}

?>
