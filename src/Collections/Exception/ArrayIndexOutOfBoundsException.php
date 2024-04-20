<?php

declare(strict_types=1);

namespace TypedCollection\Collections\Exception;

use Exception;

class ArrayIndexOutOfBoundsException extends Exception
{
    /**
     * @throws ArrayIndexOutOfBoundsException
     */
    public static function conditionApply(array $myArray, int $position): void
    {
        if (self::isAssoc($myArray)) {
            throw new self('Only works with 0 based sequential arrays');
        }

        if ($position < 0) {
            throw new self('Position must be a greater or equal 0');
        }

        $count = count($myArray);

        if ($count === 0) {
            throw new self('The array is actually empty');
        }

        if ($position >= $count) {
            if ($count === 1) {
                throw new self("The only available index is 0, but passed $position");
            }
            throw new self("Only allowed index between [0, " . ($count - 1) . "], but passed $position");
        }
    }

    /**
     * https://stackoverflow.com/questions/173400/how-to-check-if-php-array-is-associative-or-sequential
     * @param array $arr
     * @return bool
     */
    private static function isAssoc(array $arr): bool
    {
        if (array() === $arr) {
            return false;
        }

        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
