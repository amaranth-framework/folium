<?php

namespace Itmcdev\Folium\Psr7;

class JsonResponse extends \GuzzleHttp\Psr7\Response
{
    /**
     * @param int                                  $status  Status code
     * @param array                                $headers Response headers
     * @param string|null|resource|StreamInterface $body    Response body
     * @param string                               $version Protocol version
     * @param string|null                          $reason  Reason phrase (when empty a default will be used based on the status code)
     */
    public function __construct(
        $status = 200,
        array $headers = [],
        $body = null,
        $version = '1.1',
        $reason = null
    ) {
        
        if (empty($headers['Content-Type']) || strpos(strtolower($headers['Content-Type']), 'json') === FALSE) {
            $headers['Content-Type'] = 'application/json';
        }

        super::__construct($status, $headers, $body, $version, $reason);
    }
}