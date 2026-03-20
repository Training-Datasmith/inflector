<?php

declare (strict_types=1);
namespace Doctrine\Inflector;

class Cached_Word_Inflector implements Word_Inflector
{
    /** @var WordInflector */
    private $word_inflector;
    /** @var string[] */
    private $cache = [];
    public function __construct(Word_Inflector $word_inflector)
    {
        $this->word_inflector = $word_inflector;
    }
    public function inflect(string $word): string
    {
        return $this->cache[$word] ?? $this->cache[$word] = $this->word_inflector->inflect($word);
    }
}