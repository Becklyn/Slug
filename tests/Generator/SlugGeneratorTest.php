<?php declare(strict_types=1);

namespace Tests\Becklyn\Slug\Generator;

use Becklyn\Slug\Generator\SlugGenerator;
use PHPUnit\Framework\TestCase;

class SlugGeneratorTest extends TestCase
{
    /**
     * @return array
     */
    public function provideGenerate () : array
    {
        return [
            ["Some text here", "some-text-here"],
            ["Space at the end ", "space-at-the-end"],
            ["here- and there.", "here-and-there"],
            ["äöüÄÖÜß", "aeoeueaeoeuess"],
        ];
    }


    /**
     * @dataProvider provideGenerate
     *
     * @param string $text
     * @param string $expected
     */
    public function testGenerate (string $text, string $expected) : void
    {
        $slug = new SlugGenerator();
        self::assertSame($expected, $slug->generate($text));
    }
}
