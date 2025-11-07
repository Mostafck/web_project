<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['game_id', 'user_id', 'score', 'content'];

    public function game() {
        return $this->belongsTo(Game::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
