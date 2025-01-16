<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends Model
{
    //
    use HasFactory;
    protected $table = 'characters';

    protected $fillable = ['name', 'image', 'anime_id'];

    public function anime(): BelongsTo
    {
        return $this->belongsTo(Anime::class,'anime_id');
    }
}
