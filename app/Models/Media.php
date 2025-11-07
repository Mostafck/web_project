<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['game_id', 'type', 'url'];

    public function game() {
        return $this->belongsTo(Game::class);
    }
}
