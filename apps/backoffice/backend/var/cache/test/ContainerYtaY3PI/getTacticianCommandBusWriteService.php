<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTacticianCommandBusWriteService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'Eurega\Shared\Infrastructure\Bus\Command\Tactician\TacticianCommandBusWrite' shared autowired service.
     *
     * @return \Eurega\Shared\Infrastructure\Bus\Command\Tactician\TacticianCommandBusWrite
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['Eurega\\Shared\\Infrastructure\\Bus\\Command\\Tactician\\TacticianCommandBusWrite'] = new \Eurega\Shared\Infrastructure\Bus\Command\Tactician\TacticianCommandBusWrite(($container->services['tactician.commandbus.default'] ?? $container->load('getTactician_Commandbus_DefaultService')));
    }
}