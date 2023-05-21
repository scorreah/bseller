<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShoeResource;
use App\Models\Shoe;
use Illuminate\Http\JsonResponse;

class ShoeApiController extends Controller
{
    public function index(): JsonResponse
    {
        $shoes = ShoeResource::collection(Shoe::all());
        return response()->json($shoes, 200);
    }
    
    public function show(string $id): JsonResponse
    {
        $shoe = new ShoeResource(Shoe::findOrFail($id));
        return response()->json($shoe, 200);
    }
}