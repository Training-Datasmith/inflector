<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules\Esperanto;

use Doctrine\Inflector\Rules\Pattern;
final class Uninflected
{
    /** @return Pattern[] */
    public static function get_singular(): iterable
    {
        yield from self::get_default();
    }
    /** @return Pattern[] */
    public static function get_plural(): iterable
    {
        yield from self::get_default();
    }
    /** @return Pattern[] */
    private static function get_default(): iterable
    {
        yield new Pattern('');
    }
}