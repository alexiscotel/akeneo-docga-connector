<?php

namespace Oniti\Docga\ConnectorBundle;

use Oniti\Docga\ConnectorBundle\AttributeType\ExtendedAttributeTypes;

use Pim\Bundle\ElasticSearchBundle\Query\ProductQueryUtility;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DocgaExtendedAttributeTypeBundle extends Bundle
{
    public function boot()
    {
        parent::boot();

        $registeredBundles = $this->container->getParameter('kernel.bundles');
        if (array_key_exists('PimElasticSearchBundle', $registeredBundles)) {
            ProductQueryUtility::addTypeSuffix(ExtendedAttributeTypes::DOCGA, ProductQueryUtility::SUFFIX_TEXT);
        }
    }
}
