<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    
    public function tags(): BelongsToMany{
        return $this->belongsToMany(Tag::class);
    }

    public function battles(): BelongsToMany{
        return $this->belongsToMany(Battle::class,'character_battle')->withPivot('role_id','player_id');
    }

}
