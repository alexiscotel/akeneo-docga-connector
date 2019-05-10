<?php

namespace Oniti\Docga\ConnectorBundle\AttributeType;

use Akeneo\Pim\Structure\Component\AttributeType\AbstractAttributeType;

/**
 * Docga attribute type
**/
class DocgaType extends AbstractAttributeType
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return ExtendedAttributeTypes::DOCGA;
    }
}
