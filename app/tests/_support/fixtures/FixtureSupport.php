<?php
/**
 * Created by IntelliJ IDEA.
 * User: wir_wolf
 * Date: 01.08.17
 * Time: 11:43
 */

namespace  tests\_support\fixtures;

/**
 * Trait FixtureSupport
 * @package tests\_support\fixtures
 */
trait FixtureSupport
{
    /**
     * @return array
     */
    public function getFixturesData() {
        $methods = get_class_methods($this);
        $defaultData = $this->getDefaultValuesByFields();
        $data = [];
        foreach ($methods as $item) {
            if (false !== strpos($item, 'item')) {
                $data[$item] = $this->mergeWithDefault($item, $defaultData);
            }
        }
        return $data;
    }
    
    /**
     * @param $funcName
     * @param $defaultData
     * @return mixed
     */
    private function mergeWithDefault($funcName, $defaultData) {
        $data = $this->$funcName();
        foreach ($defaultData as $key => $value) {
            if (!isset($data[$key])) {
                $data[$key] = $value;
            }
        }
        return $data;
    }

    public function getMergedData($name) {
        if(!isset($this->data[$name])) {
            throw new \ErrorException('');
        }
        return $this->data[$name];
    }
}