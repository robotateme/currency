<?php


namespace App\Models\Dto;


use App\Models\Dto\Contracts\AbstractDataTransferObject;
use Illuminate\Support\Collection;

class VkPostDto extends AbstractDataTransferObject
{
    /**
     * @var integer
     */
    public $id;
    /**
     * @var string
     */
    public $text;
    /**
     * @var integer
     */
    public $from_id;
    /**
     * @var integer
     */
    public $owner_id;
    /**
     * @var array
     */
    public $attachments;

    public static function fromVk(Collection $params)
    {
        return [
            'id' => $params['id'],
            'text' => $params['text'],
            'from_id' => $params['from_id'],
            'owner' => $params['owner_id'],
        ];
    }
}
