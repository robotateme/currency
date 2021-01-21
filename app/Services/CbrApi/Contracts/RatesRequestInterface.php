<?php


namespace App\Services\CbrApi\Contracts;


interface RatesRequestInterface
{
    public function makeRequest(string $method);
    public function getResult();
}
