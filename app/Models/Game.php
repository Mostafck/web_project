<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title',
        'release_date',
        'description',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'game_category');
    }

    public function platforms() {
        return $this->belongsToMany(Platform::class, 'game_platform');
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function media() {
        return $this->hasMany(Media::class);
    }

    public function favoritedBy() {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
