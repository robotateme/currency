<?php


namespace App\Services;


use App\Models\Dto\VkPostDto;
use App\Services\VKApi\Client as VkApiClient;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

class VKPosts
{
    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function getAll()
    {
        $vkClient = new VkApiClient();
        try {
            $result = $vkClient->wall()->get([
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
