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

namespace Itmcdev\Folium\Controller\Crud;

use Itmcdev\Folium\Operation\Crud\Create;
use Itmcdev\Folium\Operation\Crud\Read;
use Itmcdev\Folium\Operation\Crud\Update;
use Itmcdev\Folium\Operation\Crud\Delete;

/**
 * CRUD Controller trait.
 * 
 * @method Controller setCreate(Create $create)
 * @method Controller setRead(Read $read)
 * @method Controller setUpdate(Update $update)
 * @method Controller setDelete(Delete $delete)
 */
trait Controller
{
    final public function operations()
    {
        return ['create', 'read', 'update', 'delete'];
    }
}
