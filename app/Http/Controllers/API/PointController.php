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
        $point = Point::create( $validated );
        return $point;
    }
}
