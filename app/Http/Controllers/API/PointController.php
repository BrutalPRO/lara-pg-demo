<?php

namespace App\Http\Controllers\API;

use App\Events\PointProcessed;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePointRequest;
use App\Models\Point;

class PointController extends Controller
{
    public function store(StorePointRequest $request)
    {
        $validated = $request->validated();
        $point = Point::firstOrCreate(
            ['latitude' => $validated['latitude'], 'longitude' => $validated['longitude']],
            $validated
        );
//        $point = Point::create( $validated );
//        broadcast(new PointProcessed($point))->toOthers();
        event(new PointProcessed($point));
        return $point;
    }
}
