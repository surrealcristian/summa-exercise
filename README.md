# Summa Solutions exercise

## Installation

```bash
$ git clone https://github.com/surrealcristian/summa-exercise.git

$ cd summa-exercise

$ $PHP71_HOME/bin/php /usr/local/bin/composer install -vv
Loading composer repositories with package information
Installing dependencies (including require-dev) from lock file
(...)
Generating autoload files
```

## Execution

```bash
$ $PHP71_HOME/bin/php bin/sandbox.php
[Employees list]
Employee 1, Developer, Developer A, 20 years old
Employee 2, Developer, Developer B, 30 years old
Employee 3, Designer, Designer A, 40 years old
Employee 4, Designer, Designer B, 50 years old

[Get employee by ID: 3]
Employee 3, Designer, Designer A, 40 years old

[Average age of the employees]
35
```

## Unit tests

```bash
$ $PHP71_HOME/bin/php vendor/phpunit/phpunit/phpunit tests
PHPUnit 6.0.8 by Sebastian Bergmann and contributors.

...........                                                       11 / 11 (100%)

Time: 75 ms, Memory: 2.00MB

OK (11 tests, 18 assertions)
```
