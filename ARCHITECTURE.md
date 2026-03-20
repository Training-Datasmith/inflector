# Architecture: inflector

## Purpose
Doctrine Inflector — converts words between singular/plural forms and between naming conventions (camelCase, snake_case, table_name, ClassName). Supports English and several other languages.

## Directory Structure
```
src/
  Inflector.php                        # Public API — tableize, classify, camelize, singularize, pluralize, urlize
  Inflector_Factory.php                # Creates Inflector instances via static factory methods
  Generic_Language_Inflector_Factory.php  # Abstract base for language-specific factories
  Language_Inflector_Factory.php       # Interface for language factories
  Word_Inflector.php                   # Interface: inflect(string $word): string
  Cached_Word_Inflector.php            # Memoizes results of an underlying Word_Inflector
  Noop_Word_Inflector.php              # Identity inflector (returns word unchanged)
  Ruleset_Inflector.php                # Applies a Ruleset to inflect a word
  Language.php                         # Language code constants
  Rules/
    Ruleset.php                        # Combines Patterns, Transformations, Substitutions, and Uninflected words
    Pattern.php                        # A single regex pattern → replacement mapping
    Patterns.php                       # Ordered collection of Patterns
    Substitution.php                   # An exact word → replacement mapping
    Substitutions.php                  # Collection of Substitutions
    Transformation.php                 # A regex transformation rule
    Transformations.php                # Collection of Transformations
    Word.php                           # An uninflected (invariant) word
    English/ French/ Spanish/ Italian/ Portuguese/ Turkish/ NorwegianBokmal/ Esperanto/
      Inflector_Factory.php            # Language-specific factory
      Rules.php                        # Provides the Ruleset for the language
      Inflectible.php                  # Irregular word pairs (e.g. "child" → "children")
      Uninflected.php                  # Words that don't change (e.g. "sheep", "fish")
tests/
```

## Key Design Decisions
- **Rule-based, not dictionary-based** — singularization and pluralization apply regex transformations in priority order, falling back to exact substitutions and uninflected-word lists.
- **Caching decorator** — `Cached_Word_Inflector` wraps any `Word_Inflector` and memoizes results, making repeated inflection calls O(1) after the first call.
- **Language factory pattern** — each language exposes an `Inflector_Factory` that builds a `Ruleset_Inflector` from language-specific rules, keeping languages fully isolated.
- **Naming convention utilities** — `tableize()`, `classify()`, `camelize()`, `urlize()` are string transformations separate from pluralization logic, included because they share the transliteration/character-normalisation infrastructure.

## Extension Points
- Add a new language by creating a `Rules/{Language}/` directory with `Inflector_Factory`, `Rules`, `Inflectible`, and `Uninflected` classes.
- Wrap any `Word_Inflector` in `Cached_Word_Inflector` for memoized performance.
- Use `Inflector_Factory::createForLanguage(Language::FRENCH)` to get a pre-built inflector.

## Dependency Flow
```
Inflector_Factory::createForLanguage(Language::ENGLISH)
  └─ English\Inflector_Factory
       └─ English\Rules::getSingularRuleset() / getPluralRuleset()
            └─ Ruleset_Inflector (wrapped in Cached_Word_Inflector)
                 └─ Ruleset → Patterns + Substitutions + Transformations + Uninflected
```
