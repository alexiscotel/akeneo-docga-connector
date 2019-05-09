<?php

namespace Oniti\Docga\ConnectorBundle\Normalizer\Flat;

use Oniti\Docga\ConnectorBundle\AttributeType\DocgaType;

/**
 */
class DocgaDenormalizerFlat extends Denormalizer
{
    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        return ('' === $data) ? null : $data;;
    }
}
