<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSchebTwoFactor_AuthenticatedTokenConditionService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'scheb_two_factor.authenticated_token_condition' shared service.
     *
     * @return \Scheb\TwoFactorBundle\Security\TwoFactor\Condition\AuthenticatedTokenCondition
     */
    public static function do($container, $lazyLoad = true)
    {
        if (true === $lazyLoad) {
            return $container->privates['scheb_two_factor.authenticated_token_condition'] = $container->createProxy('AuthenticatedTokenConditionGhost158c6bf', static fn () => \AuthenticatedTokenConditionGhost158c6bf::createLazyGhost(static fn ($proxy) => self::do($container, $proxy)));
        }

        include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Condition/TwoFactorConditionInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/scheb/2fa-bundle/Security/TwoFactor/Condition/AuthenticatedTokenCondition.php';

        return ($lazyLoad->__construct($container->parameters['scheb_two_factor.security_tokens']) && false ?: $lazyLoad);
    }
}
