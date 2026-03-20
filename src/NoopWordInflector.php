<?php

declare (strict_types=1);
namespace Doctrine\Inflector;

class Noop_Word_Inflector implements Word_Inflector
{
    public function inflect(string $word): string
    {
        return $word;
    }
}