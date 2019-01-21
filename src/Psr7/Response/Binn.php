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

namespace Itmcdev\Folium\Psr7\Response;

use Zend\Diactoros\Response;
use Zend\Diactoros\Stream;
use use Knik\Binn\Binn;

class Binn extends Response
{
    const CONTENT_TYPE = 'application/binn';

    /**
     * Create a C++/php binn response with the given data.
     * 
     * @see https://github.com/et-nik/binn-php
     *
     * @param mixed $data Data to convert to binn.
     * @param int $status Integer status code for the response; 200 by default.
     * @param array $headers Array of headers to use at initialization.
     */
    public function __construct(
        $data,
        int $status = 200,
        array $headers = []
    ) {
        $this->setPayload($data);

        $binn = $this->binnEncode($data);
        $body = $this->createBodyFromBinn($binn);

        $headers = $this->injectContentType(self::CONTENT_TYPE, $headers);

        parent::__construct($body, $status, $headers);
    }

    /**
     * @param mixed $data Data to convert to Binn
     */
    protected binnEncode($data)
    {
        return (new Binn)->serialize($data);
    }

    /**
     * Convert data into a stream containing JSON encoded data.
     *
     * @param any $data
     * @return Stream
     */
    protected function createBodyFromBinn($binn) : Stream
    {
        $body = new Stream();
        $body->write($binn);
        $body->rewind();

        return $body;
    }

}