<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'deadline_at',
        'user_id',
    ];

    protected $casts = [
        'deadline_at' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
