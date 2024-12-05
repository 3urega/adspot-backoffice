<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_Messenger_HandlerDescriptor_UKIJHilService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private '.messenger.handler_descriptor.UKIJHil' shared service.
     *
     * @return \Symfony\Component\Messenger\Handler\HandlerDescriptor
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.messenger.handler_descriptor.UKIJHil'] = new \Symfony\Component\Messenger\Handler\HandlerDescriptor(($container->privates['texter.messenger.sms_handler'] ?? $container->load('getTexter_Messenger_SmsHandlerService')), []);
    }
}
