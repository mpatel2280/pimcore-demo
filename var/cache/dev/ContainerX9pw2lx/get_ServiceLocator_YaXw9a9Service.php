<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_YaXw9a9Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.YaXw9a9' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.YaXw9a9'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'config' => ['services', 'Pimcore\\SystemSettingsConfig', 'getSystemSettingsConfigService', false],
        ], [
            'config' => 'Pimcore\\SystemSettingsConfig',
        ]);
    }
}
