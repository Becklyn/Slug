<?php declare(strict_types=1);

namespace Becklyn\Slug\Generator;

class SlugGenerator
{
    private const SANITIZE_PATTERN = '/[^a-z0-9\\-]/';


    /**
     * @var array
     */
    private $patterns;


    /**
     * @var array
     */
    private $replacements;


    /**
     *
     */
    public function __construct ()
    {
        $transforms = [
            '/ä/u' => "ae",
            '/[áâà]/u' => "a",
            '/ö/u' => "oe",
            '/[óôò]/u' => "o",
            '/ü/u' => "ue",
            '/[úûù]/u' => "u",
            '/ß/u' => "ss",
            '/[éêè]/u' => "e",
        ];
        $this->patterns = \array_keys($transforms);
        $this->replacements = \array_values($transforms);
    }


    /**
     *
     */
    public function generate (string $input) : string
    {
        return $this->sanitize(
            \preg_replace(
                $this->patterns,
                $this->replacements,
                \mb_strtolower($input)
            )
        );
    }


    /**
     *
     */
    private function sanitize (string $input) : string
    {
        $transforms = [
            self::SANITIZE_PATTERN => "-",
            '/-+/' => "-",
        ];
        return \trim(
            \preg_replace(
                \array_keys($transforms),
                \array_values($transforms),
                $input
            ),
            "-"
        );
    }


    /**
     * Generates a unique slug. Will add `-2`, `-3`, etc.. to the slug if there is a collision.
     * The callback gets the generated slug and must decide on whether the slug already exists.
     */
    public function generateUnique (string $input, callable $exists) : string
    {
        $counter = 0;

        do
        {
            ++$counter;
            $slug = $this->generate($input . ($counter > 1 ? "-{$counter}" : ""));
        }
        while ($exists($slug));

        return $slug;
    }
}
