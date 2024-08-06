<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getHtmlSanitizer_Sanitizer_Pimcore_TranslationSanitizerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'html_sanitizer.sanitizer.pimcore.translation_sanitizer' shared service.
     *
     * @return \Symfony\Component\HtmlSanitizer\HtmlSanitizer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/html-sanitizer/HtmlSanitizerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/html-sanitizer/HtmlSanitizer.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/html-sanitizer/HtmlSanitizerConfig.php';

        $a = new \Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig();
        $a = $a->allowElement('span', ['class', 'style', 'id']);
        $a = $a->allowElement('p', ['class', 'style', 'id']);
        $a = $a->allowElement('strong', 'class');
        $a = $a->allowElement('em', 'class');
        $a = $a->allowElement('h1', ['class', 'id']);
        $a = $a->allowElement('h2', ['class', 'id']);
        $a = $a->allowElement('h3', ['class', 'id']);
        $a = $a->allowElement('h4', ['class', 'id']);
        $a = $a->allowElement('h5', ['class', 'id']);
        $a = $a->allowElement('h6', ['class', 'id']);
        $a = $a->allowElement('a', ['class', 'id', 'href', 'target', 'title', 'rel']);
        $a = $a->allowElement('br', '');
        $a = $a->allowAttribute('pimcore_type', '*');
        $a = $a->allowAttribute('pimcore_id', '*');
        $a = $a->forceHttpsUrls(false);
        $a = $a->allowLinkHosts(NULL);
        $a = $a->allowRelativeLinks(true);
        $a = $a->allowMediaHosts(NULL);
        $a = $a->allowRelativeMedias(false);

        return $container->services['html_sanitizer.sanitizer.pimcore.translation_sanitizer'] = new \Symfony\Component\HtmlSanitizer\HtmlSanitizer($a);
    }
}
