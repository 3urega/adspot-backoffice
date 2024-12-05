<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRouting_Loader_AttributeService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'routing.loader.attribute' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\AttributeRouteControllerLoader
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['routing.loader.attribute'] = new \Symfony\Bundle\FrameworkBundle\Routing\AttributeRouteControllerLoader('test');
    }
}
