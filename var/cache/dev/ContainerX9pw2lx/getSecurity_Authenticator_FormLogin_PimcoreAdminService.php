<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Authenticator_FormLogin_PimcoreAdminService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'security.authenticator.form_login.pimcore_admin' shared service.
     *
     * @return \Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/AuthenticatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/AbstractAuthenticator.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/EntryPoint/AuthenticationEntryPointInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/InteractiveAuthenticatorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/AbstractLoginFormAuthenticator.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authenticator/FormLoginAuthenticator.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticationSuccessHandlerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Util/TargetPathTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/DefaultAuthenticationSuccessHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/AuthenticationFailureHandlerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-http/Authentication/DefaultAuthenticationFailureHandler.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/User/UserProviderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Security/User/UserProvider.php';

        $a = ($container->services['http_kernel'] ?? self::getHttpKernelService($container));

        if (isset($container->privates['security.authenticator.form_login.pimcore_admin'])) {
            return $container->privates['security.authenticator.form_login.pimcore_admin'];
        }
        $b = ($container->privates['security.http_utils'] ?? self::getSecurity_HttpUtilsService($container));
        $c = new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationSuccessHandler($b, [], ($container->privates['monolog.logger'] ?? self::getMonolog_LoggerService($container)));
        $c->setOptions(['default_target_path' => 'pimcore_admin_index', 'always_use_default_target_path' => true, 'login_path' => 'pimcore_admin_login', 'target_path_parameter' => '_target_path', 'use_referer' => false]);
        $c->setFirewallName('pimcore_admin');
        $d = new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler($a, $b, [], ($container->services['monolog.logger.security'] ?? self::getMonolog_Logger_SecurityService($container)));
        $d->setOptions(['login_path' => 'pimcore_admin_login', 'failure_path' => NULL, 'failure_forward' => false, 'failure_path_parameter' => '_failure_path']);

        return $container->privates['security.authenticator.form_login.pimcore_admin'] = new \Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator($b, ($container->services['Pimcore\\Security\\User\\UserProvider'] ??= new \Pimcore\Security\User\UserProvider()), $c, $d, ['login_path' => 'pimcore_admin_login', 'check_path' => 'pimcore_admin_login_check', 'username_parameter' => 'username', 'password_parameter' => 'password', 'use_forward' => false, 'require_previous_session' => false, 'csrf_parameter' => '_csrf_token', 'csrf_token_id' => 'authenticate', 'enable_csrf' => false, 'post_only' => true, 'form_only' => false]);
    }
}
