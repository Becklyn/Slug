<?php declare(strict_types=1);

namespace Tests\Becklyn\Slug\Entity;

use Becklyn\Slug\Exception\IdPropertyNotFoundException;
use Becklyn\Slug\Exception\InvalidIdException;
use PHPUnit\Framework\TestCase;
use Tests\Becklyn\Slug\Fixtures\Entity\NoIdPropertyEntity;
use Tests\Becklyn\Slug\Fixtures\Entity\NullIdPropertyEntity;
use Tests\Becklyn\Slug\Fixtures\Entity\PrefixedSlugEntity;
use Tests\Becklyn\Slug\Fixtures\Entity\ValidIdPropertyEntity;

class IdSuffixSlugEntityTraitTest extends TestCase
{
    /**
     *
     */
    public function testNoIdProperty () : void
    {
        $this->expectException(IdPropertyNotFoundException::class);
        $entity = new NoIdPropertyEntity();
        $entity->getSlug();
    }


    /**
     *
     */
    public function testNullIdProperty () : void
    {
        $this->expectException(InvalidIdException::class);
        $entity = new NullIdPropertyEntity();
        $entity->getSlug();
    }


    /**
     *
     */
    public function testValidIdProperty () : void
    {
        $entity = new ValidIdPropertyEntity();
        self::assertSame("11", $entity->getSlug());
    }


    /**
     *
     */
    public function testPrefixedSlug () : void
    {
        $entity = new PrefixedSlugEntity();
        self::assertSame("this-is-my-prefix-11", $entity->getSlug());
    }
}
