<?php

namespace Oniti\Docga\ConnectorBundle\Provider\Field;

use Oniti\Docga\ConnectorBundle\AttributeType\ExtendedAttributeTypes;
use Akeneo\Platform\Bundle\UIBundle\Provider\Field\FieldProviderInterface;
use Akeneo\Pim\Structure\Component\Model\AttributeInterface;

class DocgaProvider implements FieldProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getField($element)
    {
        return ExtendedAttributeTypes::DOCGA;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($element)
    {
        return $element instanceof AttributeInterface
            && ExtendedAttributeTypes::DOCGA === $element->getType();
    }
}