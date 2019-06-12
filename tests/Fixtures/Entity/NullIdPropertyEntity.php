<?php declare(strict_types=1);

namespace Tests\Becklyn\Slug\Fixtures\Entity;


use Becklyn\Slug\Entity\IdSuffixSlugEntityTrait;

class NullIdPropertyEntity
{
    use IdSuffixSlugEntityTrait;

    private $id;


    public function getSlug ()
    {
        return $this->generateIdSlug();
    }
}
