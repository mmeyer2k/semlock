# semlock
A clean way to wrap semaphores around closures to perform exclusive execution of code.
Semlock also allows for naming semaphones with descriptive strings instead of ints.

Read my blog posting about this tool here:

https://mmeyer2k.github.io/posts/php-exclusive-execution-closure-semaphore

## Install
`composer require mmeyer2k/semlock`

## Use
### Basic Usage
```php
\mmeyer2k\SemLock::synchronize('increment_value', function () {
    $x = get_number_from_database();

    $x++;

    sleep(5);

    save_number_to_database($x);
});
```
### Handling return values
The `semlock` library will pass return values from the closure back to the calling context.
```php
$returned = \mmeyer2k\SemLock::synchronize('increment_value', function () {
    return 'something';
});

# $returned === 'something'
```
