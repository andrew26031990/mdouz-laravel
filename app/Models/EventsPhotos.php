<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $events_id
 * @property string $path
 * @property string $base_url
 * @property Event $event
 */
class EventsPhotos extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['events_id', 'path', 'base_url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo('App\Event', 'events_id');
    }
}
