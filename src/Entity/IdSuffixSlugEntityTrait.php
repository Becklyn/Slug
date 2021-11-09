<?php declare(strict_types=1);

namespace Becklyn\Slug\Entity;

use Becklyn\Slug\Exception\IdPropertyNotFoundException;
use Becklyn\Slug\Exception\InvalidIdException;
use Becklyn\Slug\Generator\SlugGenerator;

trait IdSuffixSlugEntityTrait
{
    /**
     * Generates an ID suffixed slug with an optional prefix.
     */
    private function generateIdSlug (?string $prefix = null) : string
    {
        if (!\property_exists($this, "id"))
        {
            throw new IdPropertyNotFoundException(\sprintf(
                "Could not generate slug for entity of type '%s', as no 'id' property was found.",
                static::class
            ));
        }

        $id = $this->id;

        if (null === $id)
        {
            throw new InvalidIdException(\sprintf(
                "Could not generate slug for entity of type '%s', as the id of this entity is null.",
                static::class
            ));
        }

        $slugger = new SlugGenerator();
        return null !== $prefix
            ? $slugger->generate("{$prefix}-{$id}")
            : (string) $id;
    }
}
