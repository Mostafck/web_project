<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GameCategory extends Pivot
{
    protected $table = 'game_category';
    protected $fillable = ['game_id', 'category_id'];
}
