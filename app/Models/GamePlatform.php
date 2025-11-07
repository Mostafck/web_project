<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class GamePlatform extends Pivot
{
    protected $table = 'game_platform';
    protected $fillable = ['game_id', 'platform_id'];
}
