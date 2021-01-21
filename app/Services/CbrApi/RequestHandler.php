<?php


namespace App\Services\CbrApi;


use App\Services\CbrApi\Contracts\HandlerInterface;
use App\Services\CbrApi\Contracts\RatesRequestInterface;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

class RequestHandler implements HandlerInterface
{
    /**
     * @var RatesRequestInterface
     */
    protected $requestInstance;

    /**
     * RequestHandler constructor.
     * @param RatesRequestInterface $request
     */
    public function __construct(RatesRequestInterface $request)
    {
        $this->requestInstance = $request;
    }

    /**
     * @param string $method
     * @param array $options
     * @return string
     * @throws GuzzleException
     */
    public function execute(string $method = 'GET', array $options = [])
    {
        $client = new HttpClient();
        try {
            $response = $client->request($method, $this->requestInstance->uri, $options);
        } catch (GuzzleException $e) {
            throw $e;
        }
        return (string) $response->getBody();
    }
}
