<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules;

use function preg_match;
final class Pattern
{
    /** @var string */
    private $pattern;
    /** @var string */
    private $regex;
    public function __construct(string $pattern)
    {
        $this->pattern = $pattern;
        if (isset($this->pattern[0]) && $this->pattern[0] === '/') {
            $this->regex = $this->pattern;
        } else {
            $this->regex = '/' . $this->pattern . '/i';
        }
    }
    public function get_pattern(): string
    {
        return $this->pattern;
    }
    public function get_regex(): string
    {
        return $this->regex;
    }
    public function matches(string $word): bool
    {
        return preg_match($this->get_regex(), $word) === 1;
    }
}