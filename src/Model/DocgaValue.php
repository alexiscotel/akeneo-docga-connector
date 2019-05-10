<?php

namespace Oniti\Docga\ConnectorBundle\Model;

use Akeneo\Pim\Enrichment\Component\Product\Model\AbstractValue;
use Akeneo\Pim\Structure\Component\Model\AttributeInterface;
use Akeneo\Pim\Enrichment\Component\Product\Model\ValueInterface;

class DocgaValue extends AbstractValue implements ValueInterface
{
    /** @var string[] */
    protected $data;

    /**
     * 
     */
    public function __construct(string $attributeCode, $data = null, ?string $scopeCode, ?string $localeCode){
        parent::__construct($attributeCode, $data, $scopeCode, $localeCode);
    }

    /**
     * @return string[]
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString() : string
    {
        return trim((string)$this->data);
    }

    /**
     * {@inheritdoc}
     */
    public function isEqual(ValueInterface $value): bool
    {
        if (!$value instanceof DocgaValue ||
            $this->getScopeCode() !== $value->getScopeCode() ||
            $this->getLocaleCode() !== $value->getLocaleCode()) {
            return false;
        }

        return $value->getData() === $this->getData();
    }
}
