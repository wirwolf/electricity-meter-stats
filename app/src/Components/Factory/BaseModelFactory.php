<?php
/**
 * @author Aleksey Kucherov
 * @date: 12.07.17
 */

declare(strict_types=1);

namespace App\Components\Factory;


use App\Interfaces\AppModel;

/**
 * Class BaseModelFactory
 * @package App\Components
 */
abstract class BaseModelFactory implements Factory
{
    /**
     * @var array
     */
    protected static $models = [];

    /**
     * @param string $name
     * @param array $config
     * @return AppModel
     */
    public static function create(string $name, $config = []): AppModel
    {
        static::populateModels();
        static::isNameExist($name);

        $model = static::$models[$name];
        return new $model($config);
    }
    
    /**
     * @param string $name
     * @return string
     */
    public static function getClass(string $name): string
    {
        static::populateModels();
        static::isNameExist($name);

        return static::$models[$name];
    }

    /**
     * Method which populates @var $models
     */
    protected abstract static function populateModels();

    /**
     * @param string $name
     * @throws ModelFactoryException
     */
    protected static function isNameExist(string $name)
    {
        if (empty(static::$models[$name])) {
            throw new ModelFactoryException('Short name not found! Is it typing mistake? You search for: '. $name );
        }
    }
}
