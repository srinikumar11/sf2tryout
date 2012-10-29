<?php

namespace Srini\Bundle\JobeetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Srini\Bundle\JobeetBundle\Entity\Job as Job;

class JobType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'choice', array('choices' => Job::getTypes(), 'expanded' => true))
            ->add('company')
//            ->add('logo', null, array('label' => 'Company logo'))
            ->add('url')
            ->add('position')
            ->add('location')
            ->add('description')
            ->add('how_to_apply', null, array('label' => 'How to apply?'))
//            ->add('token')
            ->add('is_public', null, array('label' => 'Public?'))
            ->add('file', 'file', array('label' => 'Company logo', 'required' => false))
//            ->add('is_activated')
            ->add('email')
//            ->add('expires_at')
//            ->add('created_at')
//            ->add('updated_at')
            ->add('category')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Srini\Bundle\JobeetBundle\Entity\Job'
        ));
    }

    public function getName()
    {
        return 'srini_bundle_jobeetbundle_jobtype';
    }
}
