<?php

namespace App\Models;

use App\Events\PointDeleted;
use App\Events\PointProcessed;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Notifications\Notifiable;

class Point extends Model
{
    use Prunable, Notifiable;

    protected $fillable = ['latitude','longitude', 'label'];

    /**
     * Карта событий для модели.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => PointProcessed::class,
        'deleting' => PointDeleted::class,
    ];

    public function prunable()
    {
        return static::where('created_at', '<=', now());
    }

}
