<?php


namespace App\Services\CbrApi\Contracts;


interface HandlerInterface
{
    public function execute(string $method = 'GET', array $options = []);

    public function __construct(RatesRequestInterface $request);

}
