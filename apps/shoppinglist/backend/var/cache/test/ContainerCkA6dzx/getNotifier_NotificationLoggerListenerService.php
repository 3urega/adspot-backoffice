<?php

namespace ContainerCkA6dzx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNotifier_NotificationLoggerListenerService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'notifier.notification_logger_listener' shared service.
     *
     * @return \Symfony\Component\Notifier\EventListener\NotificationLoggerListener
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['notifier.notification_logger_listener'] = new \Symfony\Component\Notifier\EventListener\NotificationLoggerListener();
    }
}