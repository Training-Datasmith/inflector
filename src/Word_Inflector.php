<?php

declare (strict_types=1);
namespace Doctrine\Inflector;

interface Word_Inflector
{
    public function inflect(string $word): string;
}