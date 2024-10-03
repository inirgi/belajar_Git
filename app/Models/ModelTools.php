<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelTools extends Model
{
    use HasFactory;

    protected $table = "model_tools";

    protected $fillable = [
        'tool_category_id',
        'user_id',
        'code',
        'nama',
        'brand',
        'model',
        'production_date',
    ];

    /**
     * Get the user that owns the model_tools
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tools(): BelongsTo
    {
        return $this->belongsTo(Tools::class, 'tool_category_id', 'id');
    }

    /**
     * Get the userId that owns the model_tools
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userId(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
