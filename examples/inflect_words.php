<?php

declare(strict_types=1);

/**
 * Example: word inflection with Doctrine Inflector.
 *
 * Run from the inflector project root:
 *   php examples/inflect_words.php
 */

require __DIR__ . '/../vendor/autoload.php';

use Doctrine\Inflector\InflectorFactory;

$inflector = InflectorFactory::create()->build();

// --- Singular / plural ---
echo $inflector->pluralize('child')      . "\n"; // children
echo $inflector->pluralize('category')   . "\n"; // categories
echo $inflector->singularize('matrices') . "\n"; // matrix
echo $inflector->singularize('oxen')     . "\n"; // ox

echo "\n";

// --- Naming conventions ---
echo $inflector->tableize('ModelName')   . "\n"; // model_name
echo $inflector->classify('table_name')  . "\n"; // TableName
echo $inflector->camelize('table_name')  . "\n"; // tableName

echo "\n";

// --- URL-friendly slugs ---
echo $inflector->urlize('My First Blog Post!') . "\n"; // my-first-blog-post

// --- Accented-character stripping ---
echo $inflector->unaccent('Héllo Wörld') . "\n"; // Hello World
