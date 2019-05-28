<?php declare(strict_types=1);

error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

$test = 'asdfasdfasdfasdf';

$r = \mmeyer2k\SemLock::synchronize('asdf', function () use ($test) {
    return $test;
});

if ($r !== $test) {
    var_dump($r, $test);
    exit(1);
}

echo "YAY";
