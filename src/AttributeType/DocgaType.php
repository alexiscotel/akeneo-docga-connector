<?php

namespace Oniti\Docga\ConnectorBundle\AttributeType;

use Pim\Bundle\CatalogBundle\AttributeType\AbstractAttributeType;

/**
 * Docga attribute type
**/
class DocgaType extends AbstractAttributeType
{
    /** @var string List separator for flat format */
    const FLAT_SEPARATOR = ',';

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return ExtendedAttributeTypes::DOCGA;
    }
}
