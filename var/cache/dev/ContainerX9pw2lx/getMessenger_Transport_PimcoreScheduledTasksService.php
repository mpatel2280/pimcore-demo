<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMessenger_Transport_PimcoreScheduledTasksService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'messenger.transport.pimcore_scheduled_tasks' shared service.
     *
     * @return \Symfony\Component\Messenger\Transport\TransportInterface
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Transport/Receiver/ReceiverInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Transport/Sender/SenderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Transport/TransportInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Transport/Serialization/SerializerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/messenger/Transport/Serialization/PhpSerializer.php';

        $a = ($container->privates['messenger.transport_factory'] ?? $container->load('getMessenger_TransportFactoryService'));

        if (isset($container->privates['messenger.transport.pimcore_scheduled_tasks'])) {
            return $container->privates['messenger.transport.pimcore_scheduled_tasks'];
        }

        return $container->privates['messenger.transport.pimcore_scheduled_tasks'] = $a->createTransport('doctrine://default?queue_name=pimcore_scheduled_tasks', ['transport_name' => 'pimcore_scheduled_tasks'], ($container->privates['messenger.transport.native_php_serializer'] ??= new \Symfony\Component\Messenger\Transport\Serialization\PhpSerializer()));
    }
}
