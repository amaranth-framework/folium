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

namespace Itmcdev\Folium\Operation\Crud;

/**
 * Inteface for impelenting CRUD Delete method.
 *
 * @see https://en.wikipedia.org/wiki/Create,_read,_update_and_delete
 */
interface Delete
{
    /**
     * Delete resource(s) from the database.
     * If no items and not criteria are specified, all items in the table will be deleted.
     *
     * delete(
     *   { "text": "I really have to iron" },
     * )
     *
     * or
     *
     * delete([
     *   { "text": "I really have to iron" },
     *   { "text": "Do laundry" }
     * ])
     *
     * or
     *
     * delete([], [
     *   [ 'id', '>', 10 ]
     * ])
     *
     * @param array $items    Can be a single element or an array of elements
     * @param array $criteria to be defined
     * @param array $options  to be defined
     */
    public function delete(
        array $items = [],
        array $criteria = [],
        array $options = []
    );
}
