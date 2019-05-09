<?php

namespace Oniti\Docga\ConnectorBundle\Provider\Field;

use Pim\Bundle\EnrichBundle\Provider\Field\FieldProviderInterface;
use Oniti\Docga\ConnectorBundle\AttributeType\ExtendedAttributeTypes;
use Pim\Component\Catalog\Model\AttributeInterface;

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
