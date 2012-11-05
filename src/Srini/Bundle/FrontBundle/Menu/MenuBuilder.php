<?php

namespace Srini\Bundle\FrontBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root',array(
            'id'    => 'nav-menu',
            'class' => 'nave'
        ));


        
         $menu->addChild('Home', array('route' => '_welcome','class' => 'active'));
        $menu->addChild('About Me', array(
            'route' => 'srini_front_about',
            'routeParameters' => array('id' => 42)
        ));
        // ... add more children

        return $menu;
    }
    
    public function createSidebarMenu(Request $request)
    {
        $menu = $this->factory->createItem('sidebar');

        $menu->addChild('Job', array('route' => 'job'));
        // ... add more children

        return $menu;
    }
    
//         {{ knp_menu_render('main') }}

//{{ knp_menu_render('sidebar') }}
}