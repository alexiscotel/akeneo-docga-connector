<?php

namespace Oniti\Docga\ConnectorBundle\ArrayConverter\FlatToStandard\Product\ValueConverter;

use Akeneo\Pim\Enrichment\Component\Product\Connector\ArrayConverter\FlatToStandard\FieldSplitter;
use Akeneo\Pim\Enrichment\Component\Product\Connector\ArrayConverter\FlatToStandard\ValueConverter\AbstractValueConverter;

class DocgaValueConverter extends AbstractValueConverter
{
    public function __construct(
        FieldSplitter $fieldSplitter
    ) {
        $this->supportedFieldType = ['pim_catalog_docga'];

        parent::__construct($fieldSplitter);
    }

    /**
     * Converts a value
     *
     * @param string $attributeCode
     * @param mixed  $data
     *
     * @return array
     */
    public function convert(array $attributeFieldInfo, $value)
    {
        $result = [
            $attributeFieldInfo['attribute']->getCode() => [
                [
                    'locale' => $attributeFieldInfo['locale_code'],
                    'scope'  => $attributeFieldInfo['scope_code'],
                    'data'   => trim((string)$value),
                ],
            ],
        ];

        return $result;
    }

}