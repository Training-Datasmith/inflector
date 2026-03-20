<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules;

class Word
{
    /** @var string */
    private $word;
    public function __construct(string $word)
    {
        $this->word = $word;
    }
    public function get_word(): string
    {
        return $this->word;
    }
}