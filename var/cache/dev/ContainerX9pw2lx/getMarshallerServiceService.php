<?php

namespace ContainerX9pw2lx;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMarshallerServiceService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'Pimcore\Element\MarshallerService' shared autowired service.
     *
     * @return \Pimcore\Element\MarshallerService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/pimcore/pimcore/lib/Element/MarshallerService.php';

        return $container->services['Pimcore\\Element\\MarshallerService'] = new \Pimcore\Element\MarshallerService(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'block_consent' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\Consent', 'getConsentService', true],
            'block_date' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\Date', 'getDateService', true],
            'block_datetime' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\Date', 'getDateService', true],
            'block_encryptedField' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\EncryptedField', 'getEncryptedFieldService', true],
            'block_externalImage' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\ExternalImage', 'getExternalImageService', true],
            'block_geobounds' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\Geobounds', 'getGeoboundsService', true],
            'block_geopoint' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\Geopoint', 'getGeopointService', true],
            'block_geopolygon' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\Geopolygon', 'getGeopolygonService', true],
            'block_geopolyline' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\Geopolygon', 'getGeopolygonService', true],
            'block_localizedfields' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\Localizedfields', 'getLocalizedfieldsService', true],
            'block_rgbaColor' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\RgbaColor', 'getRgbaColorService', true],
            'block_structuredTable' => ['services', 'Pimcore\\DataObject\\BlockDataMarshaller\\StructuredTable', 'getStructuredTableService', true],
            'classificationstore_booleanSelect' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\BooleanSelect', 'getBooleanSelectService', true],
            'classificationstore_countrymultiselect' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\Multiselect', 'getMultiselectService', true],
            'classificationstore_encryptedField' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\EncryptedField', 'getEncryptedField2Service', true],
            'classificationstore_inputQuantityValue' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\QuantityValue', 'getQuantityValueService', true],
            'classificationstore_inputQuantityValueRange' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\QuantityValueRange', 'getQuantityValueRangeService', true],
            'classificationstore_languagemultiselect' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\Multiselect', 'getMultiselectService', true],
            'classificationstore_multiselect' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\Multiselect', 'getMultiselectService', true],
            'classificationstore_quantityValue' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\QuantityValue', 'getQuantityValueService', true],
            'classificationstore_quantityValueRange' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\QuantityValueRange', 'getQuantityValueRangeService', true],
            'classificationstore_rgbaColor' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\RgbaColor', 'getRgbaColor2Service', true],
            'classificationstore_table' => ['services', 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\Table', 'getTableService', true],
        ], [
            'block_consent' => 'Pimcore\\DataObject\\BlockDataMarshaller\\Consent',
            'block_date' => 'Pimcore\\DataObject\\BlockDataMarshaller\\Date',
            'block_datetime' => 'Pimcore\\DataObject\\BlockDataMarshaller\\Date',
            'block_encryptedField' => 'Pimcore\\DataObject\\BlockDataMarshaller\\EncryptedField',
            'block_externalImage' => 'Pimcore\\DataObject\\BlockDataMarshaller\\ExternalImage',
            'block_geobounds' => 'Pimcore\\DataObject\\BlockDataMarshaller\\Geobounds',
            'block_geopoint' => 'Pimcore\\DataObject\\BlockDataMarshaller\\Geopoint',
            'block_geopolygon' => 'Pimcore\\DataObject\\BlockDataMarshaller\\Geopolygon',
            'block_geopolyline' => 'Pimcore\\DataObject\\BlockDataMarshaller\\Geopolygon',
            'block_localizedfields' => 'Pimcore\\DataObject\\BlockDataMarshaller\\Localizedfields',
            'block_rgbaColor' => 'Pimcore\\DataObject\\BlockDataMarshaller\\RgbaColor',
            'block_structuredTable' => 'Pimcore\\DataObject\\BlockDataMarshaller\\StructuredTable',
            'classificationstore_booleanSelect' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\BooleanSelect',
            'classificationstore_countrymultiselect' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\Multiselect',
            'classificationstore_encryptedField' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\EncryptedField',
            'classificationstore_inputQuantityValue' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\QuantityValue',
            'classificationstore_inputQuantityValueRange' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\QuantityValueRange',
            'classificationstore_languagemultiselect' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\Multiselect',
            'classificationstore_multiselect' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\Multiselect',
            'classificationstore_quantityValue' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\QuantityValue',
            'classificationstore_quantityValueRange' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\QuantityValueRange',
            'classificationstore_rgbaColor' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\RgbaColor',
            'classificationstore_table' => 'Pimcore\\DataObject\\ClassificationstoreDataMarshaller\\Table',
        ]));
    }
}