<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules\Portuguese;

use Doctrine\Inflector\Generic_Language_Inflector_Factory;
use Doctrine\Inflector\Rules\Ruleset;
final class Inflector_Factory extends Generic_Language_Inflector_Factory
{
    protected function get_singular_ruleset(): Ruleset
    {
        return Rules::get_singular_ruleset();
    }
    protected function get_plural_ruleset(): Ruleset
    {
        return Rules::get_plural_ruleset();
    }
}