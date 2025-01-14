<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMessenger_Bus_Default_Middleware_SendMessageService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'messenger.bus.default.middleware.send_message' shared service.
     *
     * @return \Symfony\Component\Messenger\Middleware\SendMessageMiddleware
     */
    public static function do($container, $lazyLoad = true)
    {
        $container->privates['messenger.bus.default.middleware.send_message'] = $instance = new \Symfony\Component\Messenger\Middleware\SendMessageMiddleware(($container->privates['messenger.senders_locator'] ?? $container->load('getMessenger_SendersLocatorService')), ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container)), true);

        $instance->setLogger(($container->privates['logger'] ?? self::getLoggerService($container)));

        return $instance;
    }
}
