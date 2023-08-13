# Description
It is a tool to measure CPU and Memory usage throught different stages of a process

# How to install
composer require jarivas/php-performance

# How to use
Please check the tests code on tests/Unit

# Tests
* Requires Docker
* ./vendor/bin/phpunit

# Develop hint
Please run
* ```cp pre-commit-hook .git/hooks/pre-commit```
* ```chmod +x .git/hooks/pre-commit```
to add different kind of validations