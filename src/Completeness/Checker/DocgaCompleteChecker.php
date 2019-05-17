<?php

namespace  Oniti\Docga\ConnectorBundle\Completeness\Checker;

use  Oniti\Docga\ConnectorBundle\AttributeType\ExtendedAttributeTypes;

use Akeneo\Pim\Enrichment\Component\Product\Completeness\Checker\ValueCompleteCheckerInterface;
use Akeneo\Channel\Component\Model\ChannelInterface;
use Akeneo\Channel\Component\Model\LocaleInterface;
use Akeneo\Pim\Enrichment\Component\Product\Model\ValueInterface;
use Akeneo\Tool\Component\StorageUtils\Repository\IdentifiableObjectRepositoryInterface;



class DocgaCompleteChecker implements ValueCompleteCheckerInterface
{
    /** @var IdentifiableObjectRepositoryInterface */
    protected $attributeRepository;

    public function __construct(IdentifiableObjectRepositoryInterface $attributeRepository){
        $this->attributeRepository = $attributeRepository;
    }

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

        return null !== $value->getData();
    }

    /**
     * {@inheritdoc}
     */
    public function supportsValue(
        ValueInterface $value,
        ChannelInterface $channel,
        LocaleInterface $locale
    ) {
        $attribute = $this->attributeRepository->findOneByIdentifier($value->getAttributeCode());

        return ExtendedAttributeTypes::DOCGA === $attribute->getType();
    }
}
