<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules;

final class Substitution
{
    /** @var Word */
    private $from;
    /** @var Word */
    private $to;
    public function __construct(Word $from, Word $to)
    {
        $this->from = $from;
        $this->to = $to;
    }
    public function get_from(): Word
    {
        return $this->from;
    }
    public function get_to(): Word
    {
        return $this->to;
    }
}