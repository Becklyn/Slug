<?php declare(strict_types=1);

namespace Becklyn\Slug\Exception;

class SlugException extends \Exception
{
    /**
     * @inheritDoc
     */
    public function __construct (string $message, ?\Throwable $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
