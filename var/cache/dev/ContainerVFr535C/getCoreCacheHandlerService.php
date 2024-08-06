<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCoreCacheHandlerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Pimcore\Cache\Core\CoreCacheHandler' shared autowired service.
     *
     * @return \Pimcore\Cache\Core\CoreCacheHandler
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Core/CoreCacheHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Cache/Core/WriteLock.php';

        $a = ($container->services['pimcore.cache.pool'] ?? self::getPimcore_Cache_PoolService($container));

        if (isset($container->services['Pimcore\\Cache\\Core\\CoreCacheHandler'])) {
            return $container->services['Pimcore\\Cache\\Core\\CoreCacheHandler'];
        }
        $b = ($container->services['event_dispatcher'] ?? self::getEventDispatcherService($container));

        if (isset($container->services['Pimcore\\Cache\\Core\\CoreCacheHandler'])) {
            return $container->services['Pimcore\\Cache\\Core\\CoreCacheHandler'];
        }
        $c = new \Pimcore\Cache\Core\WriteLock($a);

        $d = ($container->services['monolog.logger.cache'] ?? self::getMonolog_Logger_CacheService($container));

        $c->setLogger($d);
        $c->setLogger($d);

        $container->services['Pimcore\\Cache\\Core\\CoreCacheHandler'] = $instance = new \Pimcore\Cache\Core\CoreCacheHandler($a, $c, $b);

        $instance->setLogger($d);
        $instance->setLogger($d);

        return $instance;
    }
}
