<?php

namespace Srini\Bundle\FrontBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(Request $request,  \Symfony\Component\Security\Core\SecurityContext $securityContext)
    {
        
        $menu = $this->factory->createItem('root');
        
        $menu->setChildrenAttribute('class', 'nav');
        $menu->setCurrent($request->getRequestUri());
        
         $menu->addChild('Home', array('route' => '_welcome','class' => 'active'));
        $menu->addChild('About Me', array('route' => 'srini_front_about'));
         $menu->addChild('Contact Me', array('route' => '_contact'));
         $menu->addChild('Blog', array('route' => 'srini_front_blog'));
         $menu->addChild('Jobeet', array('route' => 'job'));

         if($securityContext->isGranted('ROLE_ADMIN')){
             $menu->addChild('Admin')
             ->setAttribute('dropdown', true);
             $menu['Admin']->addChild('Profile',array('route' => 'fos_user_profile_show'))->setAttribute('divider_append', true);
             $menu['Admin']->addChild('Jobeet Admin')->setAttribute('class', 'nav-header');
             $menu['Admin']->addChild('Job',array('route' => 'job'));
             $menu['Admin']->addChild('Job Category',array('route' => 'category'))->setAttribute('divider_append', true);
             $menu['Admin']->addChild('BLOG Admin')->setAttribute('class', 'nav-header');
             $menu['Admin']->addChild('Blog', array('route' => 'blog'));
             $menu['Admin']->addChild('Blog Category', array('route' => 'admin_category'))->setAttribute('divider_append', true);
             $menu['Admin']->addChild('Logout', array('uri' => 'logout'));
         }
         else{
             $menu->addChild('Login', array('route' => 'fos_user_security_login'));
         }
        return $menu;
    }
    
    

}