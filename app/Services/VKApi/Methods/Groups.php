<?php


namespace App\Services\VKApi\Methods;


use App\Services\VKApi\Contracts\AbstractMethods;
use GuzzleHttp\Exception\GuzzleException;

class Groups extends AbstractMethods
{
    /**
     * @param array $params
     * @return array
     * @throws GuzzleException
     */
    public function edit($params = [])
    {
        return $this->makeRequest('GET', 'groups.edit', $params);
    }
}
