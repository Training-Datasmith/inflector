<?php

declare (strict_types=1);
namespace Doctrine\Inflector;

use Doctrine\Inflector\Rules\Ruleset;
interface Language_Inflector_Factory
{
    /**
     * Applies custom rules for singularisation
     *
     * @param bool $reset If true, will unset default inflections for all new rules
     *
     * @return $this
     */
    public function with_singular_rules(?Ruleset $singular_rules, bool $reset = false): self;
    /**
     * Applies custom rules for pluralisation
     *
     * @param bool $reset If true, will unset default inflections for all new rules
     *
     * @return $this
     */
    public function with_plural_rules(?Ruleset $plural_rules, bool $reset = false): self;
    /**
     * Builds the inflector instance with all applicable rules
     */
    public function build(): Inflector;
}