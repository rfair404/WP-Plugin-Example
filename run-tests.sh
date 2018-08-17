#!/usr/bin/env bash

echo Linting JS with eslint
eslint custom-content/plugins/custom-plugin/js/

echo Linting CSS with stylelint
stylelint custom-content/plugins/custom-plugin/css/

echo Running PHP_CodeSniffer + WordPress-Coding-Standards
vendor/bin/phpcs custom-content/plugins/custom-plugin --standard=phpcs.xml

echo Running PHPMD
vendor/bin/phpmd custom-content/plugins/custom-plugin text phpmd-ruleset.xml

echo Running Behat Tests
vendor/bin/behat

echo Running PHPUnit Tests
vendor/bin/phpunit
