<?php

namespace Itmcdev\Folium\Psr7\Response;

use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Stream;
use use Knik\Binn\Binn;

class Json extends Response
{
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

        $headers = $this->injectContentType('application/binn', $headers);

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