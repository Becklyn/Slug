<?php declare(strict_types=1);

namespace Tests\Becklyn\Slug\Fixtures\Entity;


use Becklyn\Slug\Entity\IdSuffixSlugEntityTrait;

class NoIdPropertyEntity
{
    use IdSuffixSlugEntityTrait;


    public function getSlug ()
    {
        return $this->generateIdSlug();
    }
}
