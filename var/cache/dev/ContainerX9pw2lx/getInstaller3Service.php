<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getInstaller3Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Pimcore\Bundle\TinymceBundle\Installer' shared autowired service.
     *
     * @return \Pimcore\Bundle\TinymceBundle\Installer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Extension/Bundle/Installer/InstallerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Extension/Bundle/Installer/AbstractInstaller.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Extension/Bundle/Installer/SettingsStoreAwareInstaller.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/TinymceBundle/src/Installer.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/migrations/src/MigrationsRepository.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Migrations/FilteredMigrationsRepository.php';
        include_once \dirname(__DIR__, 4).'/vendor/doctrine/migrations/src/Metadata/Storage/MetadataStorage.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Migrations/FilteredTableMetadataStorage.php';

        $container->services['Pimcore\\Bundle\\TinymceBundle\\Installer'] = $instance = new \Pimcore\Bundle\TinymceBundle\Installer(($container->services['kernel'] ?? $container->get('kernel'))->getBundle("PimcoreTinymceBundle"));

        $instance->setMigrationRepository(($container->services['Pimcore\\Migrations\\FilteredMigrationsRepository'] ??= new \Pimcore\Migrations\FilteredMigrationsRepository()));
        $instance->setTableMetadataStorage(($container->services['Pimcore\\Migrations\\FilteredTableMetadataStorage'] ??= new \Pimcore\Migrations\FilteredTableMetadataStorage()));
        $instance->setDependencyFactory(($container->privates['doctrine.migrations.dependency_factory'] ?? $container->load('getDoctrine_Migrations_DependencyFactoryService')));

        return $instance;
    }
}
