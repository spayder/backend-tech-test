<?php

namespace Src\Metrics\Domain\ValueObject;

class MetricsData
{
    /**
     * @var float
     */
    private $response_time;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var int
     */
    private $http_code;

    private function __construct(array $data)
    {
        $this->slug = $data['slug'];
        $this->response_time = $data['response_time'];
        $this->http_code = $data['http_code'];
    }

    public static function from(array $data): MetricsData
    {
        return new self($data);
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getResponseTime()
    {
        return $this->response_time;
    }

    public function getHttpCode()
    {
        return $this->http_code;
    }
}
