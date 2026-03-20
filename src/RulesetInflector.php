<?php

declare (strict_types=1);
namespace Doctrine\Inflector;

use function array_merge;
use Doctrine\Inflector\Rules\Ruleset;
/**
 * Inflects based on multiple rulesets.
 *
 * Rules:
 * - If the word matches any uninflected word pattern, it is not inflected
 * - The first ruleset that returns a different value for an irregular word wins
 * - The first ruleset that returns a different value for a regular word wins
 * - If none of the above match, the word is left as-is
 */
class Ruleset_Inflector implements Word_Inflector
{
    /** @var Ruleset[] */
    private $rulesets;
    public function __construct(Ruleset $ruleset, Ruleset ...$rulesets)
    {
        $this->rulesets = array_merge([$ruleset], $rulesets);
    }
    public function inflect(string $word): string
    {
        if ($word === '') {
            return '';
        }
        foreach ($this->rulesets as $ruleset) {
            if ($ruleset->get_uninflected()->matches($word)) {
                return $word;
            }
            $inflected = $ruleset->get_irregular()->inflect($word);
            if ($inflected !== $word) {
                return $inflected;
            }
            $inflected = $ruleset->get_regular()->inflect($word);
            if ($inflected !== $word) {
                return $inflected;
            }
        }
        return $word;
    }
}