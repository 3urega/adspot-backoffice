<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getConstantRandomNumberGeneratorService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'App\ShoppingList\Backend\Test\ConstantRandomNumberGenerator' shared autowired service.
     *
     * @return \App\ShoppingList\Backend\Test\ConstantRandomNumberGenerator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'src'.\DIRECTORY_SEPARATOR.'Test'.\DIRECTORY_SEPARATOR.'ConstantRandomNumberGenerator.php';

        return $container->privates['App\\ShoppingList\\Backend\\Test\\ConstantRandomNumberGenerator'] = new \App\ShoppingList\Backend\Test\ConstantRandomNumberGenerator();
    }
}