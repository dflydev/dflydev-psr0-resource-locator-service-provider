<?php

if (!file_exists(__DIR__.'/composer.json')) {
    die(
        'You must set up the project testing dependencies, run the following commands:'.PHP_EOL.
        'curl -s http://getcomposer.org/installer | php'.PHP_EOL.
        'php tests/massage-composer-for-testing.php'.PHP_EOL.
        'COMPOSER=tests/composer.json composer install --dev'.PHP_EOL);
}

require __DIR__.'/../vendor/autoload.php';
