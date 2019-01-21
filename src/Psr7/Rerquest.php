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

namespace Itmcdev\Folium\Psr7;

use Zend\Diactoros\Request;

class Request extends RequestAbstract
{

    /** @var null|string */
    protected $contents = null;

    /**
     * @param null|string|UriInterface $uri URI for the request, if any.
     * @param null|string $method HTTP method for the request, if any.
     * @param string|resource|StreamInterface $body Message body, if any.
     * @param array $headers Headers for the message, if any.
     * @throws Exception\InvalidArgumentException for any invalid value.
     */
    public function __construct($uri = null, string $method = null, $body = 'php://temp', array $headers = [])
    {
        parent::__construct($uri, $method, $body, $headers);

        $this->contents = file_get_contents("php://input");
    }

    /**
     * Obtain php://input 
     *
     * @return null|string
     */
    public function getContents()
    {
        return $this->contents;
    }

    /**
     * Obtain Request's Content Type
     *
     * @return null|string
     */
    public function getContentType()
    {
        return $this->getHeader('Content-Type');
    }
}