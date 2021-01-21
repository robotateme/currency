<?php


namespace App\Services\VKApi;


use App\Services\VKApi\Methods\Groups;
use App\Services\VKApi\Methods\Wall;

class Client
{
    /**
     * @var mixed
     */
    protected $accessToken;

    /**
     * @var RequestHandler
     */
    public $requestHandler;

    /**
     * Client constructor.
     * @param string $accessToken
     */
    public function __construct(string $accessToken = '')
    {
        $this->accessToken = env('VK_USER_AT', $accessToken);
        $this->requestHandler = new RequestHandler($this->accessToken);
    }

    public function groups()
    {
        return new Groups($this->requestHandler);
    }

    public function wall()
    {
        return new Wall($this->requestHandler);
    }
}
