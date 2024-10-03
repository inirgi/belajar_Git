<?php

namespace App\Http\Controllers;

use App\Models\model_tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ToolsCategoryResource;
use App\Models\ModelTools;

class ModelToolsController extends Controller
{
    public function indexmodel()
    {
        $model = ModelTools::all();
        return ToolsCategoryResource::collection($model->loadMissing('tools:id,nama_kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tool_category_id' => 'required|exists:tools,id',
            'code' => 'required|string',
            'nama' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'production_date' => 'required|date',
        ]);

        $validated['user_id'] = Auth::id();

        $model = ModelTools::create($validated);

        return new ToolsCategoryResource($model->loadMissing(["userId:id", "tools:id,nama_kategori"]));
    }

    public function updatemodel(Request $request, $id)
    {
        $validated = $request->validate([
            'tool_category_id' => 'required|exists:tools,id',
            'code' => 'required|string',
            'nama' => 'required|string',
            'brand' => 'required|string',
            'model' => 'required|string',
            'production_date' => 'required|date',
        ]);

        $request['user_id'] = Auth::user()->id;
        $model = ModelTools::findOrFail($id);
        $model->update($request->all());

        return new ToolsCategoryResource($model);
    }

    public function destroymodel($id)
    {
        $model = ModelTools::findOrFail($id);
        $model->delete();

        return new ToolsCategoryResource($model);
    }
}
