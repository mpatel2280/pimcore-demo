<?php

namespace Container9jmEoFL;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCache_ValidatorExpressionLanguageService extends Pimcore_Bundle_InstallBundle_InstallerKernelDevDebugContainer
{
    /**
     * Gets the public 'cache.validator_expression_language' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\AdapterInterface
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/cache/Traits/AbstractAdapterTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/contracts/Cache/CacheTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/cache/Traits/ContractsTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/cache/Adapter/AbstractAdapter.php';

        return $container->services['cache.validator_expression_language'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('3trVgQ79Q3', 0, $container->getParameter('container.build_id'), (\dirname(__DIR__, 2).'/cache/pools/system'), ($container->privates['monolog.logger.cache'] ?? $container->load('getMonolog_Logger_CacheService')));
    }
}
