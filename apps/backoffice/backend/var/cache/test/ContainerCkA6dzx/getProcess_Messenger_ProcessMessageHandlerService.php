<?php

namespace ContainerCkA6dzx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProcess_Messenger_ProcessMessageHandlerService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'process.messenger.process_message_handler' shared service.
     *
     * @return \Symfony\Component\Process\Messenger\RunProcessMessageHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['process.messenger.process_message_handler'] = new \Symfony\Component\Process\Messenger\RunProcessMessageHandler();
    }
}
