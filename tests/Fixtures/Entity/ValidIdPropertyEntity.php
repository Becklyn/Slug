<?php declare(strict_types=1);

namespace Tests\Becklyn\Slug\Fixtures\Entity;


use Becklyn\Slug\Entity\IdSuffixSlugEntityTrait;

class ValidIdPropertyEntity
{
    use IdSuffixSlugEntityTrait;

    private $id = 11;


    public function getSlug ()
    {
        return $this->generateIdSlug();
    }
}
