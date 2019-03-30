<?php

namespace mmeyer2k;

class SemLock
{
    /**
     * Ensure synchronized execution with PHP semaphore.
     *
     * @param string $semkey
     * @param \Closure $closure
     * @return mixed
     * @throws \Exception
     */
    public static function synchronize(string $semkey, \Closure $closure)
    {
        $semkey = self::key2int($semkey);

        // Get the semaphore
        $sem = sem_get($semkey, 1);

        // If semaphore can not be created, throw an exception
        if (!$sem) {
            throw new \Exception('Could not obtain semaphore.');
        }

        // Wait for semaphore
        $acquired = sem_acquire($sem);

        //
        if (!$acquired) {
            throw new \Exception('Could not lock semaphore.');
        }

        // Execute the closure and gather the return value
        $ret = $closure();

        // Release the semaphore for next thread
        sem_release($sem);

        // Return whatever the closure returned
        return $ret;
    }

    /**
     * Converts a string key into a decimal integer which is used by sem_get()
     *
     * @param string $semkey
     * @return int
     */
    private static function key2int(string $semkey): int
    {
        $semkey = md5($semkey);

        $semkey = substr($semkey, 0, 8);

        return hexdec($semkey);
    }
}
