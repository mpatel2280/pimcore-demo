<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getThumbnailsFolderStructureCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Pimcore\Bundle\CoreBundle\Command\Migrate\ThumbnailsFolderStructureCommand' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\Command\Migrate\ThumbnailsFolderStructureCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Console/AbstractCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/src/Command/Migrate/ThumbnailsFolderStructureCommand.php';

        $container->privates['Pimcore\\Bundle\\CoreBundle\\Command\\Migrate\\ThumbnailsFolderStructureCommand'] = $instance = new \Pimcore\Bundle\CoreBundle\Command\Migrate\ThumbnailsFolderStructureCommand();

        $instance->setName('pimcore:migrate:thumbnails-folder-structure');
        $instance->setDescription('Change thumbnail folder structure to'."\n".'    <asset storage>/<path to asset>/<asset id>/image-thumb__<asset id>__<thumbnail name>/<asset filename>'."\n".'    instead of'."\n".'    <asset storage>/<path to asset>/image-thumb__<asset id>__<thumbnail name>/<asset filename>');

        return $instance;
    }
}
