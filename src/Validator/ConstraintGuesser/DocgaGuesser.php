<?php

namespace Oniti\Docga\ConnectorBundle\Validator\ConstraintGuesser;

use Oniti\Docga\ConnectorBundle\AttributeType\ExtendedAttributeTypes;
use Akeneo\Pim\Structure\Component\Model\AttributeInterface;
use Akeneo\Pim\Enrichment\Component\Product\Validator\ChainedAttributeConstraintGuesser;
use Akeneo\Pim\Enrichment\Component\Product\Validator\ConstraintGuesserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Validation guesser for the docga attribute type.
 */
class DocgaGuesser implements ConstraintGuesserInterface
{
    /**
     * {@inheritdoc}
     */
    public function supportAttribute(AttributeInterface $attribute)
    {
        return $attribute->getType() === ExtendedAttributeTypes::DOCGA;
    }

    /**
     * {@inheritdoc}
     */
    public function guessConstraints(AttributeInterface $attribute)
    {
        $guesser = new ChainedAttributeConstraintGuesser();

        if ('url' === $attribute->getValidationRule()) {
            $guesser->addConstraintGuesser(new UrlGuesser());
        } elseif ('regexp' === $attribute->getValidationRule() && $pattern = $attribute->getValidationRegexp()) {
            $guesser->addConstraintGuesser(new RegexGuesser());
        } elseif ('email' === $attribute->getValidationRule()) {
            $guesser->addConstraintGuesser(new EmailGuesser());
        }

        $guesser->addConstraintGuesser(new LengthGuesser());

        $constraints = $guesser->guessConstraints($attribute);
        $constraints[] = new Assert\NotBlank();

        return [
            new Assert\All(['constraints' => $constraints]),
        ];
    }
}
