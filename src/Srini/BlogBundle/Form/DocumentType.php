<?php

namespace Srini\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('file')
        ;
    }

    public function getName()
    {
        return 'srini_blogbundle_documenttype';
    }
}
