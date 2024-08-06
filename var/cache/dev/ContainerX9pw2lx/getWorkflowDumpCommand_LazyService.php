<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getWorkflowDumpCommand_LazyService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.Pimcore\Bundle\CoreBundle\Command\WorkflowDumpCommand.lazy' shared service.
     *
     * @return \Symfony\Component\Console\Command\LazyCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/LazyCommand.php';

        return $container->privates['.Pimcore\\Bundle\\CoreBundle\\Command\\WorkflowDumpCommand.lazy'] = new \Symfony\Component\Console\Command\LazyCommand('pimcore:workflow:dump', [], 'Dump a workflow', false, #[\Closure(name: 'Pimcore\\Bundle\\CoreBundle\\Command\\WorkflowDumpCommand')] fn (): \Pimcore\Bundle\CoreBundle\Command\WorkflowDumpCommand => ($container->privates['Pimcore\\Bundle\\CoreBundle\\Command\\WorkflowDumpCommand'] ?? $container->load('getWorkflowDumpCommandService')));
    }
}
