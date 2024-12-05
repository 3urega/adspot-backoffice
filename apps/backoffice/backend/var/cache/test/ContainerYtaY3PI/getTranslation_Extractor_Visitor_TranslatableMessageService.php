<?php

namespace ContainerYtaY3PI;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getTranslation_Extractor_Visitor_TranslatableMessageService extends App_ShoppingList_Backend_ShoppingListBackendKernelTestDebugContainer
{
    /**
     * Gets the private 'translation.extractor.visitor.translatable_message' shared service.
     *
     * @return \Symfony\Component\Translation\Extractor\Visitor\TranslatableMessageVisitor
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['translation.extractor.visitor.translatable_message'] = new \Symfony\Component\Translation\Extractor\Visitor\TranslatableMessageVisitor();
    }
}