<?php


namespace App\Services\VKApi;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;


class RequestHandler
{
    public const URI = 'https://api.vk.com', VERSION = 5.126;

    /**
     * @var string $accessToken
     */
    protected $accessToken;

    /**
     * RequestHandler constructor.
     * @param string $accessToken
     */
    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }


    /**
     * @param string $apiMethod
     * @param array $params
     * @param string $httpMethod
     * @return array
     * @throws GuzzleException
     */
    public function makeRequest(string $apiMethod, string $httpMethod = 'GET', $params = [])
    {
        $guzzleClient = new HttpClient();
        try {
            $params['v'] = static::VERSION;
            $params['access_token'] = $this->accessToken;
            $url = static::URI . "/method/$apiMethod";
            return json_decode((string)$guzzleClient->request($httpMethod, $url, $params = ['query' => $params])
                ->getBody());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @param string $accessToken
     * @return RequestHandler
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
        return $this;
    }

}
