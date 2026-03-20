<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules;

use Doctrine\Inflector\Word_Inflector;
class Transformations implements Word_Inflector
{
    /** @var Transformation[] */
    private $transformations;
    public function __construct(Transformation ...$transformations)
    {
        $this->transformations = $transformations;
    }
    public function inflect(string $word): string
    {
        foreach ($this->transformations as $transformation) {
            if ($transformation->get_pattern()->matches($word)) {
                return $transformation->inflect($word);
            }
        }
        return $word;
    }
}