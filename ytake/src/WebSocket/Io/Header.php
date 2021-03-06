<?php
namespace Ytake\WebSocket\Io;

/**
 * Class Header
 * @package Ytake\WebSocket\Io
 * @author  yuuki.takezawa<yuuki.takezawa@excite.jp>
 */
class Header implements HeaderInterface
{
    /** @var array */
    protected $header = [
        // Informational 1xx
        100 => "Continue",
        101 => "Switching Protocols",
        // Successful 2xx
        200 => "OK",
        201 => "Created",
        202 => "Accepted",
        203 => "Non-Authoritative Information",
        204 => "No Content",
        205 => "Reset Content",
        206 => "Partial Content",
        //Redirection 3xx
        300 => "Multiple Choices",
        301 => "Moved Permanently",
        302 => "Found",
        303 => "See Other",
        304 => "Not Modified",
        305 => "Use Proxy",
        306 => "(Unused)",
        307 => "Temporary Redirect",
        // Client Error 4xx
        400 => "Bad Request",
        401 => "Unauthorized",
        402 => "Payment Required",
        403 => "Forbidden",
        404 => "Not Found",
        405 => "Method Not Allowed",
        406 => "Not Acceptable",
        407 => "Proxy Authentication Required",
        408 => "Request Timeout",
        409 => "Conflict",
        410 => "Gone",
        411 => "Length Required",
        412 => "Precondition Failed",
        413 => "Request Entity Too Large",
        414 => "Request-URI Too Long",
        415 => "Unsupported Media Type",
        416 => "Requested Range Not Satisfiable",
        417 => "Expectation Failed",
        // Server Error 5xx
        500 => "Internal Server Error",
        501 => "Not Implemented",
        502 => "Bad Gateway",
        503 => "Service Unavailable",
        504 => "Gateway Timeout",
        505 => "HTTP Version Not Supported",
    ];

    /**
     * @return array
     */
    public function getResponseHeader()
    {
        return $this->header;
    }

    /**
     * @param $uri
     * @param $host
     * @param array $key
     * @param array $options
     * @param int $version Sec-WebSocket-Version
     * @return string|void
     */
    public function setRequestHeader($uri, $host, $key, array $options = null, $version = 13)
    {
        $output = [
            "GET {$uri} HTTP/1.1",
            "Host: {$host}",
            "Upgrade: WebSocket",
            "Connection: Upgrade",
            "Sec-WebSocket-Key: {$key}",
            "Sec-WebSocket-Version: {$version}",
            "Origin: *"
        ];
        if(is_array($options))
        {
            return implode("\r\n", array_merge($output, $options)) . "\r\n";
        }
        return implode("\r\n", $output) . "\r\n\r\n";
    }
}