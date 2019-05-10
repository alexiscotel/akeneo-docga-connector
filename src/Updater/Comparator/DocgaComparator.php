<?php

namespace Oniti\Docga\ConnectorBundle\Updater\Comparator;

use Akeneo\Pim\Enrichment\Component\Product\Comparator\ComparatorInterface;

/**
 * Comparator which calculate change set for text collection
 */
class DocgaComparator implements ComparatorInterface
{
    /** @var array */
    protected $types;

    /**
     * @param array $types
     */
    public function __construct(array $types)
    {
        $this->types = $types;
    }

    /**
     * {@inheritdoc}
     */
    public function supports($type)
    {
        return in_array($type, $this->types);
    }

    /**
     * {@inheritdoc}
     */
    public function compare($data, $originals)
    {
        $default = ['locale' => null, 'scope' => null, 'data' => []];
        $originals = array_merge($default, $originals);

        if ($data['data'] === $originals['data']) {
            return null;
        }

        return $data;
    }
}
