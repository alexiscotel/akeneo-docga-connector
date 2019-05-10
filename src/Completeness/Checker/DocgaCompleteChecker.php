<?php

namespace  Oniti\Docga\ConnectorBundle\Completeness\Checker;

use  Oniti\Docga\ConnectorBundle\AttributeType\ExtendedAttributeTypes;
use Akeneo\Pim\Enrichment\Component\Product\Completeness\Checker\ValueCompleteCheckerInterface;
use Akeneo\Channel\Component\Model\ChannelInterface;
use Akeneo\Channel\Component\Model\LocaleInterface;
use Akeneo\Pim\Enrichment\Component\Product\Model\ValueInterface;

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
