<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Tag extends Model
{
    //
    use HasFactory;
    protected $table='tags';

    protected $fillable= ['name'];

    public function characters(): BelongsToMany{
        return $this->belongsToMany(Character::class);
    }

}
