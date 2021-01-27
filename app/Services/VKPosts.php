<?php


namespace App\Services;


use App\Models\Dto\VkPostDto;
use App\Services\VKApi\Client as VkApiClient;
use App\Services\VKApi\Contracts\PostsServiceInterface;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class VKPosts implements PostsServiceInterface
{
    /**
     * @var VkApiClient
     */
    private $vkClient;

    public function __construct(VkApiClient $vkClient)
    {
        $this->vkClient = $vkClient;
    }

    /**
     * @return array
     * @throws Exception
     * @throws GuzzleException
     */
    public function getAll()
    {
        try {
            $result = $this->vkClient
                ->wall()->get([
                    'owner_id' => 1, //Должен быть отрицательным для группы
                ]);
        } catch (Exception $e) {
            throw $e;
        }
        $posts = [];
        /** @var object $result */
        if ($result->response && $result->response->count > 0) {
            foreach ($result->response->items as $item) {
                $posts[] = VkPostDto::fromVk(collect($item));
            }
        }
        return $posts;
    }
}
