<?php

namespace Srini\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('blog')
            ->add('name')
            ->add('email')
            ->add('comment','textarea', array(
        'attr' => array(
            'class' => 'tinymce',
            'data-theme' => 'advanced' // simple, advanced, bbcode
        )
    ))
//            ->add('created_at')
//            ->add('updated_at')
            
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Srini\Bundle\BlogBundle\Entity\Comment'
        ));
    }

    public function getName()
    {
        return 'srini_bundle_blogbundle_commenttype';
    }
}
