<?php

namespace App\Http\Middleware;

use App\Models\model_tools;
use App\Models\ModelTools;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PemilikModel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentModel = Auth::user();
        $model = ModelTools::findOrFail($request->id);

        if ($model->user_id != $currentModel->id) {
            return response()->json(['message' => 'data not found'], 404);
        }

        return $next($request);
    }
}
