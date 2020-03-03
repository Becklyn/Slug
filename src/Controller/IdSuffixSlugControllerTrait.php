<?php declare(strict_types=1);

namespace Becklyn\Slug\Controller;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait IdSuffixSlugControllerTrait
{
    /**
     * Matches an ID automatically from a prefixed slug.
     */
    private function matchIdFromSlug (string $slug) : int
    {
        if (0 !== \preg_match('~^(?:.*-)?(?<id>\\d+)$~', $slug, $matches))
        {
            $id = (int) $matches['id'];

            if ($id < 1)
            {
                throw new NotFoundHttpException("Could not match an ID (larger than zero) in the slug.");
            }

            return $id;
        }


        throw new NotFoundHttpException("Could not match an ID in the slug.");
    }
}
