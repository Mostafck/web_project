<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'avatar'];

    protected $hidden = ['password', 'remember_token'];

    // روابط
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function favorites() {
        return $this->belongsToMany(Game::class, 'favorites');
    }

    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function news() {
        return $this->hasMany(News::class);
    }
}
