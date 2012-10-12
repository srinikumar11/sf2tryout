<?php

namespace Srini\Bundle\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('blog','textarea', array(
        'attr' => array(
            'class' => 'tinymce',
            'data-theme' => 'advanced' // simple, advanced, bbcode
        )
    ))
            ->add('published')
            ->add('created_at')
            ->add('updated_at')
                ->add('category', 'entity', array('class' => 'SriniBlogBundle:Category', 'property' => 'name'))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Srini\Bundle\BlogBundle\Entity\Blog'
        ));
    }

    public function getName()
    {
        return 'srini_bundle_blogbundle_blogtype';
    }
}
