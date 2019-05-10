<?php

namespace Oniti\Docga\ConnectorBundle\Enrich\Provider\Field;

use Akeneo\Pim\Structure\Component\Model\AttributeInterface;
use Akeneo\Platform\Bundle\UIBundle\Provider\Field\FieldProviderInterface;
use Oniti\Docga\ConnectorBundle\AttributeType\ExtendedAttributeTypes;

class DocgaFieldProvider implements FieldProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getField($attribute)
    {
        return ExtendedAttributeTypes::DOCGA;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($element)
    {
        return $element instanceof AttributeInterface &&
            $element->getType() === ExtendedAttributeTypes::DOCGA;
    }
}