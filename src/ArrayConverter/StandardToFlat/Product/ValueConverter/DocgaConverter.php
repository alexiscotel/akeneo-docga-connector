<?php

namespace Oniti\Docga\ConnectorBundle\ArrayConverter\StandardToFlat\Product\ValueConverter;

use Oniti\Docga\ConnectorBundle\AttributeType\TextCollectionType;
use Pim\Component\Connector\ArrayConverter\StandardToFlat\Product\ValueConverter\AbstractValueConverter;
use Pim\Component\Connector\ArrayConverter\StandardToFlat\Product\ValueConverter\ValueConverterInterface;

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

        foreach ($data as $value) {
            $flatName = $this->columnsResolver->resolveFlatAttributeName(
                $attributeCode,
                $value['locale'],
                $value['scope']
            );

            $convertedItem[$flatName] = trim((string)$value);
        }

        return $convertedItem;
    }
}
