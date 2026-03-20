<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules;

use Doctrine\Inflector\Word_Inflector;
use function strtolower;
use function strtoupper;
use function substr;
class Substitutions implements Word_Inflector
{
    /** @var Substitution[] */
    private $substitutions;
    public function __construct(Substitution ...$substitutions)
    {
        foreach ($substitutions as $substitution) {
            $this->substitutions[$substitution->get_from()->get_word()] = $substitution;
        }
    }
    public function get_flipped_substitutions(): Substitutions
    {
        $substitutions = [];
        foreach ($this->substitutions as $substitution) {
            $substitutions[] = new Substitution($substitution->get_to(), $substitution->get_from());
        }
        return new Substitutions(...$substitutions);
    }
    public function inflect(string $word): string
    {
        $lower_word = strtolower($word);
        if (isset($this->substitutions[$lower_word])) {
            $first_letter_uppercase = $lower_word[0] !== $word[0];
            $to_word = $this->substitutions[$lower_word]->get_to()->get_word();
            if ($first_letter_uppercase) {
                return strtoupper($to_word[0]) . substr($to_word, 1);
            }
            return $to_word;
        }
        return $word;
    }
}