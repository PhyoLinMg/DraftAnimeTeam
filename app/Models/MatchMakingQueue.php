<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use App\Enums\Status;

class MatchMakingQueue extends Model
{
    //
    use HasFactory;
    protected $table= 'match_making_queues';

    protected $fillable= ['player_name','status'];
    
    protected function casts(): array {
        return [
            'status'=> Status::class,
        ];
    }
}
