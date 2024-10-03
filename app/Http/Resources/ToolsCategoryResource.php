<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ToolsCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'tool_category_id' => $this->whenLoaded('tools'),
            'user_id' => $this->user_id,
            'code' => $this->code,
            'nama' => $this->nama,
            'brand' => $this->brand,
            'model' => $this->model,
            'production_date' => date_format(date_create($this->production_date), "Y/m/d"),
        ];
    }
}
