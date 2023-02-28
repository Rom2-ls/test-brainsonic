<?php

namespace ContainerPjxbfja;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCreateCompanyCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Command\CreateCompanyCommand' shared autowired service.
     *
     * @return \App\Command\CreateCompanyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/src/Command/CreateCompanyCommand.php';

        $container->privates['App\\Command\\CreateCompanyCommand'] = $instance = new \App\Command\CreateCompanyCommand();

        $instance->setName('create-company');
        $instance->setDescription('Add a short description for your command');

        return $instance;
    }
}
