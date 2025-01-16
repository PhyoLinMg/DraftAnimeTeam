<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Board extends Model
{
    //
    use HasFactory;
    protected $table = 'boards';

    protected $fillable = ['role_1', 'role_2', 'role_3', 'role_4', 'role_5', 'role_6'];

    public function battle()
    {
        return $this->belongsTo(Battle::class);
    }
}
