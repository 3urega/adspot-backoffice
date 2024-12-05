<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCache_DefaultMarshallerService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'cache.default_marshaller' shared service.
     *
     * @return \Symfony\Component\Cache\Marshaller\DefaultMarshaller
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['cache.default_marshaller'] = new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL, true);
    }
}