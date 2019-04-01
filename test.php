<?php
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

$r = 'asdffdsa';

$r = \mmeyer2k\SemLock::synchronize('asdf', function() use ($test) {
    return $test;
});

if ($r !== $test) {
    var_dump($r, $test);
    exit(1);
}
