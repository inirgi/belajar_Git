<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tools extends Model
{
    use HasFactory;

    protected $table = "tools";

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'author'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }
}
