<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getWorkflowManagementListener2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Pimcore\Bundle\CoreBundle\EventListener\WorkflowManagementListener' shared autowired service.
     *
     * @return \Pimcore\Bundle\CoreBundle\EventListener\WorkflowManagementListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/bundles/CoreBundle/src/EventListener/WorkflowManagementListener.php';

        $a = ($container->services['Pimcore\\Workflow\\Manager'] ?? $container->load('getManagerService'));

        if (isset($container->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'])) {
            return $container->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'];
        }

        return $container->services['Pimcore\\Bundle\\CoreBundle\\EventListener\\WorkflowManagementListener'] = new \Pimcore\Bundle\CoreBundle\EventListener\WorkflowManagementListener($a);
    }
}
