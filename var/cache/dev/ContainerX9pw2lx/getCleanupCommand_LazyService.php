<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCleanupCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.Pimcore\Bundle\CoreBundle\Command\Document\CleanupCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.Pimcore\\Bundle\\CoreBundle\\Command\\Document\\CleanupCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('pimcore:documents:cleanup', [], 'Cleans up unused document types. Removes type from enums and tables if exist', false, #[\Closure(name: 'Pimcore\\Bundle\\CoreBundle\\Command\\Document\\CleanupCommand')] fn (): \Pimcore\Bundle\CoreBundle\Command\Document\CleanupCommand => ($container->privates['Pimcore\\Bundle\\CoreBundle\\Command\\Document\\CleanupCommand'] ?? $container->load('getCleanupCommandService')));
    }
}
