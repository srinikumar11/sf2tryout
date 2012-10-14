<?php

namespace Srini\Bundle\FrontBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setAttribute('class', 'nav');
        $menu->addChild('Home', array('route' => '_welcome'));
        $menu->addChild('About Me', array(
            'route' => 'srini_front_about',
            'routeParameters' => array('id' => 42)
        ));
        // ... add more children

        return $menu;
    }
}