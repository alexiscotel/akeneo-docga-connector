<?php

namespace Oniti\Docga\ConnectorBundle\Filter\ProductValue;

use Oniti\Docga\ConnectorBundle\DataGrid\Form\Type\Filter\DocgaFilterType;

use Oro\Bundle\FilterBundle\Form\Type\Filter\FilterType;
use Oro\Bundle\PimFilterBundle\Filter\ProductValue\StringFilter;
use Akeneo\Pim\Enrichment\Component\Product\Query\Filter\Operators;


class DocgaFilter extends StringFilter
{
    /** @var array */
    protected $operatorTypes = [
        DocgaFilterType::TYPE_CONTAINS     => Operators::CONTAINS,
        DocgaFilterType::TYPE_NOT_CONTAINS => Operators::DOES_NOT_CONTAIN,
        FilterType::TYPE_EMPTY            => Operators::IS_EMPTY,
        FilterType::TYPE_NOT_EMPTY        => Operators::IS_NOT_EMPTY,
    ];

    /**
     * {@inheritDoc}
     */
    protected function getFormType()
    {
        return DocgaFilterType::class;
    }

    public function getForm()
    {
        return parent::getForm();
    }
}
