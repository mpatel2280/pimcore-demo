<?php

namespace ContainerVFr535C;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getRgbaColor2Service extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Pimcore\DataObject\ClassificationstoreDataMarshaller\RgbaColor' shared autowired service.
     *
     * @return \Pimcore\DataObject\ClassificationstoreDataMarshaller\RgbaColor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Marshaller/MarshallerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/FielddefinitionMarshaller/Traits/RgbaColorTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/DataObject/ClassificationstoreDataMarshaller/RgbaColor.php';

        return $container->services['Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\RgbaColor'] = new \Pimcore\DataObject\ClassificationstoreDataMarshaller\RgbaColor();
    }
}
