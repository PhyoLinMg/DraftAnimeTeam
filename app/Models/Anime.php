<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
    //
    protected $table = 'animes';

    protected $fillable = ['name', 'image'];

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
