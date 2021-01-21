<?php

namespace App\Http\Controllers;

use App\Services\VKPosts;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    protected $VKPosts;

    public function __construct(VKPosts $VKPosts)
    {
        $this->VKPosts = $VKPosts;
    }

    /**
     * @param Request $request
     * @return array
     * @throws GuzzleException
     */
    public function index(Request $request)
    {
        return $this->VKPosts->getAll();
    }
}
