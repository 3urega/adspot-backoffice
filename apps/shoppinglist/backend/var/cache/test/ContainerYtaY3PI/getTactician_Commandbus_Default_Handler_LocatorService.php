<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTactician_Commandbus_Default_Handler_LocatorService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'tactician.commandbus.default.handler.locator' shared service.
     *
     * @return \League\Tactician\Container\ContainerLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['tactician.commandbus.default.handler.locator'] = new \League\Tactician\Container\ContainerLocator(($container->privates['tactician.commandbus.default.handler.service_locator'] ?? $container->load('getTactician_Commandbus_Default_Handler_ServiceLocatorService')), ['Eurega\\ShoppingList\\Application\\Query\\Usuario\\SearchUsuarioParticularByCriteriaQuery' => 'Eurega\\ShoppingList\\Application\\Query\\Usuario\\SearchUsuarioParticularByCriteriaQueryHandler', 'Eurega\\ShoppingList\\Application\\Command\\Usuario\\CrearUsuarioParticularCommand' => 'Eurega\\ShoppingList\\Application\\Command\\Usuario\\CrearUsuarioParticularCommandHandler']);
    }
}
