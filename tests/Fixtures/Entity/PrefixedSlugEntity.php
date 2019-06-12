<?php declare(strict_types=1);

namespace Tests\Becklyn\Slug\Fixtures\Entity;


use Becklyn\Slug\Entity\IdSuffixSlugEntityTrait;

class PrefixedSlugEntity
{
    use IdSuffixSlugEntityTrait;

    private $id = 11;


    public function getSlug ()
    {
        return $this->generateIdSlug("This is my prefix!");
    }
}
