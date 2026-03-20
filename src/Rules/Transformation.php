<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules;

use Doctrine\Inflector\Word_Inflector;
use function preg_replace;
final class Transformation implements Word_Inflector
{
    /** @var Pattern */
    private $pattern;
    /** @var string */
    private $replacement;
    public function __construct(Pattern $pattern, string $replacement)
    {
        $this->pattern = $pattern;
        $this->replacement = $replacement;
    }
    public function get_pattern(): Pattern
    {
        return $this->pattern;
    }
    public function get_replacement(): string
    {
        return $this->replacement;
    }
    public function inflect(string $word): string
    {
        return (string) preg_replace($this->pattern->get_regex(), $this->replacement, $word);
    }
}