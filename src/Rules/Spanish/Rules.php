<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules\Spanish;

use Doctrine\Inflector\Rules\Patterns;
use Doctrine\Inflector\Rules\Ruleset;
use Doctrine\Inflector\Rules\Substitutions;
use Doctrine\Inflector\Rules\Transformations;
final class Rules
{
    public static function get_singular_ruleset(): Ruleset
    {
        return new Ruleset(new Transformations(...Inflectible::get_singular()), new Patterns(...Uninflected::get_singular()), (new Substitutions(...Inflectible::get_irregular()))->get_flipped_substitutions());
    }
    public static function get_plural_ruleset(): Ruleset
    {
        return new Ruleset(new Transformations(...Inflectible::get_plural()), new Patterns(...Uninflected::get_plural()), new Substitutions(...Inflectible::get_irregular()));
    }
}