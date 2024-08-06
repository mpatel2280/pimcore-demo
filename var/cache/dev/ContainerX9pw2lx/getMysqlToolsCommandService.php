<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMysqlToolsCommandService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'Pimcore\Bundle\CoreBundle\Command\MysqlToolsCommand' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\Command\MysqlToolsCommand
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/console/Command/Command.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Console/AbstractCommand.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/src/Command/MysqlToolsCommand.php';

        $container->privates['Pimcore\\Bundle\\CoreBundle\\Command\\MysqlToolsCommand'] = $instance = new \Pimcore\Bundle\CoreBundle\Command\MysqlToolsCommand();

        $instance->setName('pimcore:mysql-tools');
        $instance->setAliases(['mysql-tools']);
        $instance->setDescription('Optimize and warmup mysql database');

        return $instance;
    }
}
