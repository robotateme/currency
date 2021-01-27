<?php


namespace App\Services\VKApi\Contracts;


interface PostsServiceInterface
{
    public function getAll(int $limit = 100);
}
