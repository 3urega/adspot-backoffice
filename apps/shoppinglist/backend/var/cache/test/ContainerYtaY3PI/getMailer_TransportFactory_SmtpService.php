<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMailer_TransportFactory_SmtpService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'mailer.transport_factory.smtp' shared service.
     *
     * @return \Symfony\Component\Mailer\Transport\Smtp\EsmtpTransportFactory
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['mailer.transport_factory.smtp'] = new \Symfony\Component\Mailer\Transport\Smtp\EsmtpTransportFactory(($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container)), ($container->privates['http_client.uri_template'] ?? $container->load('getHttpClient_UriTemplateService')), ($container->privates['logger'] ?? self::getLoggerService($container)));
    }
}
