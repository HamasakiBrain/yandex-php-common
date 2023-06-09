<?php

namespace Yandex\Common;

use Yandex\Common\Exception\InvalidArgumentException;

/**
 * String collection
 *
 * @category Yandex
 * @package  Common
 *
 */
class StringCollection
{
    /**
     * This string collection will convert to one string in get request by join
     *
     * @var string
     */
    protected $collection = [];

    public function __construct($strings)
    {
        foreach ($strings as $string) {
            if (!self::isString($string)) {
                throw new InvalidArgumentException('Argument must have only strings');
            }

            $this->collection[] = $string;
        }
    }

    private static function isString($string)
    {
        return is_string($string) || method_exists($string, '__toString');
    }

    /**
     * @param $strings
     *
     * @return null|self
     * @throws InvalidArgumentException
     */
    public static function init($strings)
    {
        if (is_null($strings)) {
            return null;
        }

        if (self::isString($strings)) {
            return new static([$strings]);
        }

        if (is_array($strings)) {
            if (empty($strings)) {
                return null;
            }

            return new self($strings);
        }

        throw new InvalidArgumentException('Argument must be string or string list ' . gettype($strings) . ' received');
    }

    public function getAll()
    {
        return implode(',', $this->collection);
    }

    public function asArray()
    {
        return $this->collection;
    }
}
