<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Destination;

class DestinationController extends Controller
{
    public function destination()
    {
        $destination = Destination::get();
        return DestinationResource::collection($destination);
    }

    public function detailDestination(Destination $destination)
    {
        $detail_destination = Destination::where('id', $destination->id)->first();
        return new DestinationResource($detail_destination);
    }

    public function categoryDestination(Category $category)
    {
        $destination = Destination::where('category_id', $category->id)->get();
        return DestinationResource::collection($destination);
    }
}
