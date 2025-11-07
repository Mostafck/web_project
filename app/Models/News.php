<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'image', 'user_id'];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
