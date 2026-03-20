<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules;

class Ruleset
{
    /** @var Transformations */
    private $regular;
    /** @var Patterns */
    private $uninflected;
    /** @var Substitutions */
    private $irregular;
    public function __construct(Transformations $regular, Patterns $uninflected, Substitutions $irregular)
    {
        $this->regular = $regular;
        $this->uninflected = $uninflected;
        $this->irregular = $irregular;
    }
    public function get_regular(): Transformations
    {
        return $this->regular;
    }
    public function get_uninflected(): Patterns
    {
        return $this->uninflected;
    }
    public function get_irregular(): Substitutions
    {
        return $this->irregular;
    }
}