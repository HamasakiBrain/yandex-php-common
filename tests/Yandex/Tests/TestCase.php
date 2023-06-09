<?php
/**
 * @namespace
 */

namespace Yandex\Tests;

use PHPUnit\Framework\TestCase as PHPUnitFrameworkTestCase;
use ReflectionClass;
use Yandex;

/**
 * ControllerTestCase
 *
 * @category Yandex
 * @package  Tests
 *
 */
class TestCase extends PHPUnitFrameworkTestCase
{
    /**
     * @param string|object $classNameOrObject
     * @param string        $name
     *
     * @return \ReflectionMethod
     */
    protected static function getNotAccessibleMethod($classNameOrObject, $name)
    {
        $class = new ReflectionClass($classNameOrObject);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
}
