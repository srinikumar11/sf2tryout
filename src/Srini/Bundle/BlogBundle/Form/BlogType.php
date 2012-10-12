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
            ->add('blog')
            ->add('published')
            ->add('created_at')
            ->add('updated_at')
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
