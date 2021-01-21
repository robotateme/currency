<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Notification
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $user_id
 * @method static Builder|Notification newModelQuery()
 * @method static Builder|Notification newQuery()
 * @method static Builder|Notification query()
 * @method static Builder|Notification whereCreatedAt($value)
 * @method static Builder|Notification whereId($value)
 * @method static Builder|Notification whereUpdatedAt($value)
 * @method static Builder|Notification whereUserId($value)
 * @mixin Eloquent
 * @property string $message
 * @property string $type
 * @property-read \App\Models\User $user
 * @method static Builder|Notification whereMessage($value)
 * @method static Builder|Notification whereType($value)
 */
class Notification extends Model
{
    const TYPE_DEFAULT = 'default', TYPE_RATES = 'rates', TYPE_SERVICE = 'service';
    use HasFactory;
    public $timestamps = false;
    public $fillable = [
        'message',
        'type',
        'created_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
