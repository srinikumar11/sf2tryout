<?php

namespace Srini\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('blog')
        ;
    }

    public function getName()
    {
        return 'srini_blogbundle_blogtype';
    }
}
