<?php
/**
 * Copyright 2018 IT Media Connect.
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

namespace Itmcdev\Folium\Operation;

/**
 * Undocumented class.
 */
class Operation
{
    protected $modelClass = null;

    /**
     * Constructor.
     *
     * @param string $modelClass class name used for model
     */
    public function __construct(string $modelClass = null)
    {
        $this->modelClass = $modelClass;
    }

    /**
     * Setter for a model's class.
     *
     * @param string $modelClass class name used for model
     *
     * @return self
     */
    public function setModelClass(string $modelClass)
    {
        $this->modelClass = $modelClass;

        return $this;
    }

    public function getModelClass()
    {
        return $this->modelClass;
    }
}
