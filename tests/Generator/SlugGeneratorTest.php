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
            ["here- and there.", "here-and-there."],
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


    /**
     */
    public function provideGenerateUnique () : \Generator
    {
        yield ["Some text here", [], "some-text-here"];
        yield ["Some text here", [
            "some-text-here",
        ], "some-text-here-2"];
        yield ["Some text here", [
            "some-text-here",
            "some-text-here-2",
            "some-text-here-3",
            "some-text-here-4",
        ], "some-text-here-5"];
        yield ["Some text here", [
            "some-other",
        ], "some-text-here"];
    }


    /**
     * @dataProvider provideGenerateUnique
     */
    public function testGenerateUnique (string $text, array $existing, string $expected) : void
    {
        $slug = new SlugGenerator();
        $exists = function (string $slug) use ($existing)
        {
            return \in_array($slug, $existing, true);
        };

        self::assertSame($expected, $slug->generateUnique($text, $exists));
    }
}
