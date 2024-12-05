<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMysqlUsuarioParticularWriteRepositoryService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'Tests\Shared\Infrastructure\Repository\MysqlUsuarioParticularWriteRepository' shared autowired service.
     *
     * @return \Tests\Shared\Infrastructure\Repository\MysqlUsuarioParticularWriteRepository
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['Tests\\Shared\\Infrastructure\\Repository\\MysqlUsuarioParticularWriteRepository'] = new \Tests\Shared\Infrastructure\Repository\MysqlUsuarioParticularWriteRepository();
    }
}
