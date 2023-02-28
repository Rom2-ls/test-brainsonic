<?php

namespace ContainerGwoi5jG;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_0c77nnSService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.0c77nnS' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.0c77nnS'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'billetRepository' => ['privates', 'App\\Repository\\BilletRepository', 'getBilletRepositoryService', true],
        ], [
            'billetRepository' => 'App\\Repository\\BilletRepository',
        ]);
    }
}