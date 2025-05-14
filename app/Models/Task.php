<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'priority',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'status' => 'string',
        'priority' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
