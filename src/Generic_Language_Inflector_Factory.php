<?php

declare (strict_types=1);
namespace Doctrine\Inflector;

use function array_unshift;
use Doctrine\Inflector\Rules\Ruleset;
abstract class Generic_Language_Inflector_Factory implements Language_Inflector_Factory
{
    /** @var Ruleset[] */
    private $singular_rulesets = [];
    /** @var Ruleset[] */
    private $plural_rulesets = [];
    final public function __construct()
    {
        $this->singular_rulesets[] = $this->get_singular_ruleset();
        $this->plural_rulesets[] = $this->get_plural_ruleset();
    }
    final public function build(): Inflector
    {
        return new Inflector(new Cached_Word_Inflector(new Ruleset_Inflector(...$this->singular_rulesets)), new Cached_Word_Inflector(new Ruleset_Inflector(...$this->plural_rulesets)));
    }
    final public function with_singular_rules(?Ruleset $singular_rules, bool $reset = false): Language_Inflector_Factory
    {
        if ($reset) {
            $this->singular_rulesets = [];
        }
        if ($singular_rules instanceof Ruleset) {
            array_unshift($this->singular_rulesets, $singular_rules);
        }
        return $this;
    }
    final public function with_plural_rules(?Ruleset $plural_rules, bool $reset = false): Language_Inflector_Factory
    {
        if ($reset) {
            $this->plural_rulesets = [];
        }
        if ($plural_rules instanceof Ruleset) {
            array_unshift($this->plural_rulesets, $plural_rules);
        }
        return $this;
    }
    abstract protected function get_singular_ruleset(): Ruleset;
    abstract protected function get_plural_ruleset(): Ruleset;
}