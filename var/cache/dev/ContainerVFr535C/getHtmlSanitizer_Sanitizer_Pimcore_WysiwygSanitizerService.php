<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getHtmlSanitizer_Sanitizer_Pimcore_WysiwygSanitizerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'html_sanitizer.sanitizer.pimcore.wysiwyg_sanitizer' shared service.
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
        $a = $a->allowElement('div', ['class', 'style', 'id']);
        $a = $a->allowElement('p', ['class', 'style', 'id']);
        $a = $a->allowElement('strong', 'class');
        $a = $a->allowElement('em', 'class');
        $a = $a->allowElement('h1', ['class', 'id']);
        $a = $a->allowElement('h2', ['class', 'id']);
        $a = $a->allowElement('h3', ['class', 'id']);
        $a = $a->allowElement('h4', ['class', 'id']);
        $a = $a->allowElement('h5', ['class', 'id']);
        $a = $a->allowElement('h6', ['class', 'id']);
        $a = $a->allowElement('a', ['class', 'id', 'href', 'target', 'title', 'rel', 'style']);
        $a = $a->allowElement('table', ['class', 'style', 'cellspacing', 'cellpadding', 'border', 'width', 'height', 'id']);
        $a = $a->allowElement('colgroup', 'class');
        $a = $a->allowElement('col', ['class', 'style', 'id']);
        $a = $a->allowElement('thead', ['class', 'id']);
        $a = $a->allowElement('tbody', ['class', 'id']);
        $a = $a->allowElement('tr', ['class', 'id']);
        $a = $a->allowElement('td', ['class', 'id']);
        $a = $a->allowElement('th', ['class', 'id', 'scope']);
        $a = $a->allowElement('ul', ['class', 'style', 'id']);
        $a = $a->allowElement('li', ['class', 'style', 'id']);
        $a = $a->allowElement('ol', ['class', 'style', 'id']);
        $a = $a->allowElement('u', ['class', 'id']);
        $a = $a->allowElement('i', ['class', 'id']);
        $a = $a->allowElement('b', ['class', 'id']);
        $a = $a->allowElement('caption', ['class', 'id']);
        $a = $a->allowElement('sub', ['class', 'id']);
        $a = $a->allowElement('sup', ['class', 'id']);
        $a = $a->allowElement('blockquote', ['class', 'id']);
        $a = $a->allowElement('s', ['class', 'id']);
        $a = $a->allowElement('iframe', ['frameborder', 'height', 'longdesc', 'name', 'sandbox', 'scrolling', 'src', 'title', 'width']);
        $a = $a->allowElement('br', '');
        $a = $a->allowElement('img', ['alt', 'style', 'src']);
        $a = $a->allowAttribute('pimcore_type', '*');
        $a = $a->allowAttribute('pimcore_id', '*');
        $a = $a->forceHttpsUrls(false);
        $a = $a->allowLinkHosts(NULL);
        $a = $a->allowRelativeLinks(true);
        $a = $a->allowMediaHosts(NULL);
        $a = $a->allowRelativeMedias(true);

        return $container->services['html_sanitizer.sanitizer.pimcore.wysiwyg_sanitizer'] = new \Symfony\Component\HtmlSanitizer\HtmlSanitizer($a);
    }
}
