<?php

namespace App\Models;

use App\Models\Board;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'board_id',
        'title',
        'description',
        'completed',
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    protected $casts = [
        'completed' => 'boolean',
    ];
}
