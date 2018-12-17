<?php
/**
 * Copyright 2018 IT Media Connect
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Itmcdev\Folium\Util;

/**
 * Undocumented class
 */
class CrudUtils
{
    /** @var string $_countProperty */
    protected static $_countProperty = '__count';

    protected static $_deletedProperty = 'deleted';

    protected static $_permanentDeleteProperty = 'permanent';

    /**
     * @param string $model
     * @return boolean
     */
    public static function canSoftDelete($modelClass)
    {
        return (
            method_exists($modelClass, 'canSoftDelete') &&
            $modelClass::canSoftDelete()
        );
    }

    /**
     * Obtain the name of the options property which will request count functionality out of the Read operation.
     * 
     * @param string $name
     * @return string
     */
    public static function countProperty(string $name = null)
    {
        if (!empty($name)) {
            self::$_countProperty = $name;
        }
        return self::$_countProperty;
    }

    /**
     * Obtain the name of the options property which will request deleted functionality out of the Read operation.
     *
     * @param string $name
     * @return string
     */
    public static function deletedProperty(string $name = null)
    {
        if (!empty($name)) {
            self::$_deletedProperty = $name;
        }
        return self::$_deletedProperty;
    }

    /**
     * Obtain the name of the options property which will request permanentDelete functionality out of the Read operation.
     *
     * @param string $name
     * @return string
     */
    public static function permanentDeleteProperty(string $name = null)
    {
        if (!empty($name)) {
            self::$_permanentDeleteProperty = $name;
        }
        return self::$_permanentDeleteProperty;
    }
}
