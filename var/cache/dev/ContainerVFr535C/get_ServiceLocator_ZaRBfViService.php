<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_ZaRBfViService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.ZaRBfVi' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.ZaRBfVi'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'csrfProtection' => ['services', 'Pimcore\\Bundle\\AdminBundle\\Security\\CsrfProtectionHandler', 'getCsrfProtectionHandlerService', false],
            'eventDispatcher' => ['services', 'event_dispatcher', 'getEventDispatcherService', false],
            'gridHelperService' => ['privates', 'Pimcore\\Bundle\\AdminBundle\\Helper\\GridHelperService', 'getGridHelperServiceService', true],
            'localeService' => ['services', 'Pimcore\\Localization\\LocaleServiceInterface', 'getLocaleServiceInterfaceService', false],
        ], [
            'csrfProtection' => 'Pimcore\\Bundle\\AdminBundle\\Security\\CsrfProtectionHandler',
            'eventDispatcher' => '?',
            'gridHelperService' => 'Pimcore\\Bundle\\AdminBundle\\Helper\\GridHelperService',
            'localeService' => 'Pimcore\\Localization\\LocaleServiceInterface',
        ]);
    }
}
