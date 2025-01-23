<?php

namespace App\Models;

use App\Enums\BoardType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Board extends Model
{
    //
    use HasFactory;
    protected $table = 'boards';

    protected $fillable = ['name'];

    public function battle():BelongsTo
    {
        return $this->belongsTo(Battle::class);
    }
    public function roles():BelongsToMany{
        return $this->belongsToMany(Role::class);
    }

    protected function casts(): array {
        return [
            'type'=> BoardType::class,
        ];
    }
}
