<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_WAsaUE7Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.WAsaUE7' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.WAsaUE7'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'profiler' => ['services', '.container.private.profiler', 'get_Container_Private_ProfilerService', false],
        ], [
            'profiler' => '?',
        ]);
    }
}
