<?php

namespace App\Http\Controllers;

use App\Models\tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ToolsDetailResource;

class ToolsController extends Controller
{
    public function indextools()
    {
        $tools = tools::all();
        return ToolsDetailResource::collection($tools);
    }

    public function showtools($id)
    {
        $tools = tools::findOrFail($id);
        return new ToolsDetailResource($tools);
    }

    public function storetools(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:255',
            'deskripsi' => 'required',
        ]);
        $request['author'] = Auth::user()->id;
        $tools = tools::create($request->all());
        return new ToolsDetailResource($tools);
    }
    public function updatetools(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:255',
            'deskripsi' => 'required'
        ]);

        $request['author'] = Auth::user()->id;
        $tools = tools::findOrFail($id);
        $tools->update($request->all());

        return new ToolsDetailResource($tools);
    }
    public function destroytools($id)
    {
        $tools = tools::findOrFail($id);
        $tools->delete();

        return new ToolsDetailResource($tools);
    }
}
