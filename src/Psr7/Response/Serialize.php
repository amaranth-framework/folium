<?php

namespace Itmcdev\Folium\Psr7;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;

class Serialize extends Response
{
     /**
     * Create a php/serialized response with the given data.
     *
     * @param mixed $data Data to serialize.
     * @param int $status Integer status code for the response; 200 by default.
     * @param array $headers Array of headers to use at initialization.
     * @throws Exception\InvalidArgumentException if unable to encode the $data to JSON.
     */
    public function __construct(
        $data,
        int $status = 200,
        array $headers = []
    ) {
        $this->setPayload($data);

        $serialized = serialize($data);
        $body = $this->createBodyFromSerialized($serialized);

        $headers = $this->injectContentType('application/php-serialized', $headers);

        parent::__construct($body, $status, $headers);
    }

    /**
     * Convert data into a stream containing JSON encoded data.
     *
     * @param any $serialized
     * @return Stream
     */
    protected function createBodyFromSerialized($serialized) : Stream
    {
        $body = new Stream('php://temp', 'wb+');
        $body->write($serialized);
        $body->rewind();

        return $body;
    }

}