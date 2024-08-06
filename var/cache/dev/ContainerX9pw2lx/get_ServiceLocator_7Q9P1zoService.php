<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_7Q9P1zoService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.7Q9P1zo' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.7Q9P1zo'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'workflowManager' => ['services', 'Pimcore\\Workflow\\Manager', 'getManagerService', true],
            'workflowRegistry' => ['privates', 'workflow.registry', 'getWorkflow_RegistryService', true],
        ], [
            'workflowManager' => 'Pimcore\\Workflow\\Manager',
            'workflowRegistry' => '?',
        ]);
    }
}
