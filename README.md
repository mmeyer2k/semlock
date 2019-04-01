# semlock
A nifty way to wrap semaphores around closures to perform exclusive execution of code.
Semlock also allows for naming semaphones with descriptive strings instead of ints.

Read my blog posting about this technology.

## Install
`composer require mmeyer2k/semlock`

## Use
```php
\mmeyer2k\SemLock::synchronize('increment_value', function () {
    $x = get_number_from_database();

    $x++;

    sleep(5);

    save_number_to_database($x);
});
```
