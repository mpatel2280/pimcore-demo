<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_O7Z4kTWService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.o7Z4kTW' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.o7Z4kTW'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'event_dispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
            'security.event_dispatcher.pimcore_admin' => ['privates', 'debug.security.event_dispatcher.pimcore_admin', 'getDebug_Security_EventDispatcher_PimcoreAdminService', false],
            'security.event_dispatcher.pimcore_webdav' => ['privates', 'debug.security.event_dispatcher.pimcore_webdav', 'getDebug_Security_EventDispatcher_PimcoreWebdavService', false],
        ], [
            'event_dispatcher' => '?',
            'security.event_dispatcher.pimcore_admin' => '?',
            'security.event_dispatcher.pimcore_webdav' => '?',
        ]);
    }
}
