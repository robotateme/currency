<?php


namespace App\Services\VKApi\Methods;


use App\Services\VKApi\Contracts\AbstractMethods;
use GuzzleHttp\Exception\GuzzleException;

class Wall extends AbstractMethods
{
    /**
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function get($params = [])
    {
        return $this->makeRequest('GET', 'wall.get', $params);
    }
}
