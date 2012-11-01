<?php

namespace Srini\Bundle\JobeetBundle\Utils;
use Symfony\Component\Form\Extension\Core\ChoiceList\SimpleChoiceList as SimpleChoiceList;
class JobTypeChoices extends SimpleChoiceList
{
    public static $choices = array(
        'full-time' => 'Full time', 
        'part-time' => 'Part time', 
        'freelance'  => 'Freelance',
    );

    /**
     * Constructor.
     *
     * @param array $preferredChoices Preffered choices in the list.
     */
    public function __construct(array $preferredChoices = array()) // PASS MORE ARGUMENT IF NEEDED
    {
        parent::__construct(
            static::$choices,
            $preferredChoices
        );
    }
}