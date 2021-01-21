<?php


namespace App\Services\VKApi\Contracts;


use App\Services\VKApi\RequestHandler;
use GuzzleHttp\Exception\GuzzleException;

class AbstractMethods
{
    /**
     * @var RequestHandler
     */
    private $requestHandler;

    /**
     * AbstractMethods constructor.
     * @param RequestHandler $requestHandler
     */
    public function __construct(RequestHandler $requestHandler)
    {
        $this->requestHandler = $requestHandler;
    }

    /**
     * @param $httpMethod
     * @param $apiMethod
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function makeRequest($httpMethod, $apiMethod, $params = [])
    {
        try {
            return $this->requestHandler
                ->makeRequest($apiMethod, $httpMethod, $params);
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
