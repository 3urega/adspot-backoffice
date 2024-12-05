<?php

namespace ContainerCkA6dzx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Messenger_HandlerDescriptor_WG_ORBvService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private '.messenger.handler_descriptor.WG.oRBv' shared service.
     *
     * @return \Symfony\Component\Messenger\Handler\HandlerDescriptor
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.messenger.handler_descriptor.WG.oRBv'] = new \Symfony\Component\Messenger\Handler\HandlerDescriptor(($container->privates['mailer.messenger.message_handler'] ?? $container->load('getMailer_Messenger_MessageHandlerService')), []);
    }
}
