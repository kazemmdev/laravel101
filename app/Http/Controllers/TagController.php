<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use Illuminate\Http\JsonResponse;

class TagController extends Controller
{
    public function index(): JsonResponse
    {
        $query = Tag::where('name', 'LIKE', "%" . request('name') . "%")->take(5)->get();
        return response()->json($query);
    }

    public function store(StoreTagRequest $request): JsonResponse
    {
        $tag = Tag::create($request->validated());
        return response()->json($tag);
    }

    public function destroy(Tag $tag)
    {
        //
    }
}
