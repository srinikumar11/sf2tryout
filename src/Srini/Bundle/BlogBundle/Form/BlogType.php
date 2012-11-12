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
            ->add('category', 'entity', array('class' => 'SriniBlogBundle:Category', 'property' => 'name'))
            ->add('title')
            ->add('blog','textarea')
            ->add('author')
            ->add('published')
                
            ;
        $builder->add('tags', 'collection', array(
            'type'         => new TagType(),
            'allow_add'    => true,
            'allow_delete' => true,
            'by_reference' => false,
        ));
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
