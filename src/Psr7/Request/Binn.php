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
declare(strict_types=1);

namespace Itmcdev\Folium\Psr7\Request;

use Itmcdev\Folium\Psr7\Request;
use Itmcdev\Folium\Psr7\Request\Exception\BadRequest;
use use Knik\Binn\Binn;

class Binn extends Request
{

    const CONTENT_TYPE = 'application/binn';

    /**
     * Convert data contents into a binn/unserialized variable.
     *
     * @return null|mixed
     * @throws BasRequest
     */
    public function getContentsAsParams()
    {
        $contentType = $this->getContentType();
        if (empty($contentType) || $contentType !== self::CONTENT_TYPE) {
            return null;
        }

        try {
            return (new Binn)->unserialize($this->contents);
        } catch (\Exception $e) {
            throw BadRequest('Invalid contents', $e);
        }
    }
}