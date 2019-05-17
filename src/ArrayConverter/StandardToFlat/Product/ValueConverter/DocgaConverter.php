<?php

namespace Oniti\Docga\ConnectorBundle\ArrayConverter\StandardToFlat\Product\ValueConverter;

use Oniti\Docga\ConnectorBundle\AttributeType\TextCollectionType;
use Akeneo\Pim\Enrichment\Component\Product\Connector\ArrayConverter\StandardToFlat\Product\ValueConverter\AbstractValueConverter;
use Akeneo\Pim\Enrichment\Component\Product\Connector\ArrayConverter\StandardToFlat\Product\ValueConverter\ValueConverterInterface;

/**
 * Converts a docga value from Akeneo PIM standard format to Akeneo PIM flat format
 */
class DocgaConverter extends AbstractValueConverter implements ValueConverterInterface
{
    /**
     * Converts a value
     *
     * @param string $attributeCode
     * @param mixed  $data
     *
     * @return array
     */
    public function convert($attributeCode, $data)
    {
        $convertedItem = [];

        $flatName = $this->columnsResolver->resolveFlatAttributeName(
            $attributeCode,
            $value['locale'],
            $value['scope']
        );

        $convertedItem[$flatName] = json_decode($value);

        return $convertedItem;
    }
}
