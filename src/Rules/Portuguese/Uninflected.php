<?php

declare (strict_types=1);
namespace Doctrine\Inflector\Rules\Portuguese;

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
        yield new Pattern('atlas');
        yield new Pattern('bate-papo');
        yield new Pattern('cais');
        yield new Pattern('fênix');
        yield new Pattern('guarda-chuva');
        yield new Pattern('guarda-roupa');
        yield new Pattern('lápis');
        yield new Pattern('oásis');
        yield new Pattern('ônibus');
        yield new Pattern('ônus');
        yield new Pattern('pára-brisa');
        yield new Pattern('pára-choque');
        yield new Pattern('pires');
        yield new Pattern('porta-malas');
        yield new Pattern('porta-voz');
        yield new Pattern('sem-terra');
        yield new Pattern('tênis');
        yield new Pattern('tórax');
        yield new Pattern('vírus');
    }
}