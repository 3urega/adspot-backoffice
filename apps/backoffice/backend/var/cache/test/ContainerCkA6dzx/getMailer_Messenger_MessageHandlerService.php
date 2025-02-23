<?php

namespace ContainerCkA6dzx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMailer_Messenger_MessageHandlerService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'mailer.messenger.message_handler' shared service.
     *
     * @return \Symfony\Component\Mailer\Messenger\MessageHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['mailer.messenger.message_handler'] = new \Symfony\Component\Mailer\Messenger\MessageHandler(($container->privates['mailer.transports'] ?? $container->load('getMailer_TransportsService')));
    }
}
