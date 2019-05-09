<?php

namespace Oniti\Docga\ConnectorBundlele\Completeness\Checker;

use Oniti\Docga\ConnectorBundlele\AttributeType\ExtendedAttributeTypes;
use Pim\Component\Catalog\Completeness\Checker\ValueCompleteCheckerInterface;
use Pim\Component\Catalog\Model\ChannelInterface;
use Pim\Component\Catalog\Model\LocaleInterface;
use Pim\Component\Catalog\Model\ValueInterface;

class DocgaCompleteChecker implements ValueCompleteCheckerInterface
{
    /**
     * {@inheritdoc}
     */
    public function isComplete(
        ValueInterface $value,
        ChannelInterface $channel = null,
        LocaleInterface $locale = null
    ) {
        if (null !== $value->getScope() && $channel->getCode() !== $value->getScope()) {
            return false;
        }

        if (null !== $value->getLocale() && $locale->getCode() !== $value->getLocale()) {
            return false;
        }

        $collection = $value->getData();

        return null !== $collection && count($collection) > 0;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsValue(
        ValueInterface $value,
        ChannelInterface $channel,
        LocaleInterface $locale
    ) {
        return ExtendedAttributeTypes::DOCGA === $value->getAttribute()->getType();
    }
}
