<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSchebTwoFactor_ConditionRegistryService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'scheb_two_factor.condition_registry' shared service.
     *
     * @return \Scheb\TwoFactorBundle\Security\TwoFactor\Condition\TwoFactorConditionRegistry
     */
    public static function do($container, $lazyLoad = true)
    {
        if (true === $lazyLoad) {
            return $container->privates['scheb_two_factor.condition_registry'] = $container->createProxy('TwoFactorConditionRegistryGhostD09c223', static fn () => \TwoFactorConditionRegistryGhostD09c223::createLazyGhost(static fn ($proxy) => self::do($container, $proxy)));
        }

        include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Condition/TwoFactorConditionRegistry.php';

        return ($lazyLoad->__construct(new RewindableGenerator(function () use ($container) {
            yield 0 => ($container->privates['scheb_two_factor.authenticated_token_condition'] ?? $container->load('getSchebTwoFactor_AuthenticatedTokenConditionService'));
            yield 1 => ($container->privates['scheb_two_factor.ip_whitelist_condition'] ?? $container->load('getSchebTwoFactor_IpWhitelistConditionService'));
            yield 2 => ($container->privates['Pimcore\\Bundle\\AdminBundle\\Security\\PimcoreUserTwoFactorCondition'] ??= new \Pimcore\Bundle\AdminBundle\Security\PimcoreUserTwoFactorCondition());
        }, 3)) && false ?: $lazyLoad);
    }
}
