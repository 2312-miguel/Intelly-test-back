<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use Illuminate\Http\Request;

class AssetsController extends Controller
{
    public function index()
    {
        return Assets::all();
    }

    public function show(Assets $assets, $id)
    {
        $result = Assets::find($id);
        $result->makeHidden(['created_at', 'updated_at']);
        return response()->json($result, 200);
    }

    public function store(Request $request)
    {
        $assets = Assets::create($request->all());

        return response()->json($assets, 201);
    }

    public function update(Request $request, Assets $assets)
    {
        $assets = Assets::where('id', $request->id)->update($request->json()->all());

        return response()->json(["status" => $assets, "id" => $request->id], 200);
    }

    public function delete(Assets $assets)
    {
        $assets->delete();

        return response()->json(null, 204);
    }
}
