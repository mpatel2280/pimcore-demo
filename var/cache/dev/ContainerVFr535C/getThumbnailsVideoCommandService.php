<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getThumbnailsVideoCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Pimcore\Bundle\CoreBundle\Command\ThumbnailsVideoCommand' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\Command\ThumbnailsVideoCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Console/AbstractCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Console/Traits/ParallelizationBase.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Console/Traits/Parallelization.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/src/Command/ThumbnailsVideoCommand.php';

        $container->privates['Pimcore\\Bundle\\CoreBundle\\Command\\ThumbnailsVideoCommand'] = $instance = new \Pimcore\Bundle\CoreBundle\Command\ThumbnailsVideoCommand();

        $instance->setName('pimcore:thumbnails:video');
        $instance->setAliases(['thumbnails:video']);
        $instance->setDescription('Generate video thumbnails, useful to pre-generate thumbnails in the background');

        return $instance;
    }
}
