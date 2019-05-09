<?php

namespace Oniti\Docga\ConnectorBundle\Filter;

use Pim\Bundle\EnrichBundle\Provider\Filter\FilterProviderInterface;
use Oniti\Docga\ConnectorBundle\AttributeType\ExtendedAttributeTypes;
use Pim\Component\Catalog\Model\AttributeInterface;

/**
 * Filter provider for text collection attribute
 *
 * This provider is registered via DI tag to add the text collection filter.
 */
class FilterProvider implements FilterProviderInterface
{
    /** @var array */
    protected $filters = [
        ExtendedAttributeTypes::DOCGA => [
            'product-export-builder' => 'akeneo-attribute-docga-filter',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function getFilters($attribute)
    {
        return $this->filters[$attribute->getAttributeType()];
    }

    /**
     * {@inheritdoc}
     */
    public function supports($element)
    {
        return $element instanceof AttributeInterface &&
            in_array($element->getType(), array_keys($this->filters));
    }
}
