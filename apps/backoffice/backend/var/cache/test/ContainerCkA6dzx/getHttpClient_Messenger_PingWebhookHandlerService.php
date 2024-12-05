<?php

namespace ContainerCkA6dzx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getHttpClient_Messenger_PingWebhookHandlerService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'http_client.messenger.ping_webhook_handler' shared service.
     *
     * @return \Symfony\Component\HttpClient\Messenger\PingWebhookMessageHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['http_client.messenger.ping_webhook_handler'] = new \Symfony\Component\HttpClient\Messenger\PingWebhookMessageHandler(($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')));
    }
}
