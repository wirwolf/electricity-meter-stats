<?php
/**
 * Created by IntelliJ IDEA.
 * User: wir_wolf
 * Date: 28.07.17
 * Time: 10:57
 */

namespace tests\unit;

use Codeception\Util\Debug;


/**
 * Class BaseTestCase
 * @package unit
 */
class BaseTestCase extends \Codeception\Test\Unit
{
    /**
     * @param $object
     * @param $methodName
     * @param array $parameters
     * @return mixed
     */
    public function invokeMethod(&$object, $methodName, array $parameters = [])
    {
        try {
            $reflection = new \ReflectionClass(get_class($object));
            $method = $reflection->getMethod($methodName);
            $method->setAccessible(true);
            
            return $method->invokeArgs($object, $parameters);
        } catch (\ReflectionException $e) {
            Debug::debug($e->getMessage());
            return false;
        }
        
    }
    
    public function getPropertyValue($object,\ReflectionClass $reflectionClass,$propertyName)
    {
        $property = $reflectionClass->getProperty($propertyName);
        $property->setAccessible(true);
        return $property->getValue($object);
    }
}