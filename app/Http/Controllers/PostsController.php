<?php

namespace App\Http\Controllers;

use App\Services\VKApi\Contracts\PostsServiceInterface;
use App\Services\VKPosts;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    protected $postsService;

    public function __construct(PostsServiceInterface $postsService)
    {
        /** @var VKPosts $postsService */
        $this->postsService = $postsService;
    }

    /**
     * @param Request $request
     * @return array
     * @throws GuzzleException
     */
    public function index(Request $request)
    {
        return $this->postsService->getAll();
    }
}
