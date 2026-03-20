<?php

declare (strict_types=1);
namespace Doctrine\Inflector;

use Doctrine\Inflector\Rules\English;
use Doctrine\Inflector\Rules\Esperanto;
use Doctrine\Inflector\Rules\French;
use Doctrine\Inflector\Rules\Italian;
use Doctrine\Inflector\Rules\Norwegian_Bokmal;
use Doctrine\Inflector\Rules\Portuguese;
use Doctrine\Inflector\Rules\Spanish;
use Doctrine\Inflector\Rules\Turkish;
use InvalidArgumentException;
use function sprintf;
final class Inflector_Factory
{
    public static function create(): Language_Inflector_Factory
    {
        return self::create_for_language(Language::ENGLISH);
    }
    public static function create_for_language(string $language): Language_Inflector_Factory
    {
        switch ($language) {
            case Language::ENGLISH:
                return new English\Inflector_Factory();
            case Language::ESPERANTO:
                return new Esperanto\Inflector_Factory();
            case Language::FRENCH:
                return new French\Inflector_Factory();
            case Language::ITALIAN:
                return new Italian\Inflector_Factory();
            case Language::NORWEGIAN_BOKMAL:
                return new Norwegian_Bokmal\Inflector_Factory();
            case Language::PORTUGUESE:
                return new Portuguese\Inflector_Factory();
            case Language::SPANISH:
                return new Spanish\Inflector_Factory();
            case Language::TURKISH:
                return new Turkish\Inflector_Factory();
            default:
                throw new InvalidArgumentException(sprintf('Language "%s" is not supported.', $language));
        }
    }
}