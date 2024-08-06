<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_EWGQ0DxService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.eWGQ0Dx' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.eWGQ0Dx'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'cache' => ['services', 'Pimcore\\Cache\\Core\\CoreCacheHandler', 'getCoreCacheHandlerService', true],
            'config' => ['privates', 'Pimcore\\Bundle\\AdminBundle\\System\\AdminConfig', 'getAdminConfigService', true],
            'eventDispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
            'filesystem' => ['privates', 'filesystem', 'getFilesystemService', true],
            'kernel' => ['services', 'kernel', 'getKernelService', false],
            'symfonyCacheClearer' => ['services', 'Pimcore\\Cache\\Symfony\\CacheClearer', 'getCacheClearerService', true],
        ], [
            'cache' => 'Pimcore\\Cache\\Core\\CoreCacheHandler',
            'config' => 'Pimcore\\Bundle\\AdminBundle\\System\\AdminConfig',
            'eventDispatcher' => '?',
            'filesystem' => '?',
            'kernel' => '?',
            'symfonyCacheClearer' => 'Pimcore\\Cache\\Symfony\\CacheClearer',
        ]);
    }
}
