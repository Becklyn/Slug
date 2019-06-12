<?php declare(strict_types=1);

namespace Tests\Becklyn\Slug\Controller;

use Becklyn\Slug\Controller\IdSuffixSlugControllerTrait;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IdSuffixSlugControllerTraitTest extends TestCase
{
    /**
     * @return array
     */
    public function provideValid () : array
    {
        return [
            ["testasd-23", 23],
            ["testasd-1", 1],
            ["this-is-some-test-11", 11],
            ["11", 11],
            ["-11", 11],
        ];
    }

    /**
     * @dataProvider provideValid
     *
     * @param string $slug
     * @param int    $expected
     */
    public function testValid (string $slug, int $expected) : void
    {
        $controller = $this->createController();
        self::assertSame($expected, $controller->parse($slug));
    }


    /**
     * @return array
     */
    public function provideInvalid () : array
    {
        return [
            ["nodash23"],
            ["zero-0"],
            ["no number"],
        ];
    }


    /**
     * @dataProvider provideInvalid
     *
     * @param string $slug
     */
    public function testInvalid (string $slug) : void
    {
        $this->expectException(NotFoundHttpException::class);
        $controller = $this->createController();
        $controller->parse($slug);
    }


    /**
     *
     */
    private function createController ()
    {
        return new class {
            use IdSuffixSlugControllerTrait;


            public function parse (string $slug) : int
            {
                return $this->matchIdFromSlug($slug);
            }
        };
    }
}
