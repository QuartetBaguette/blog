<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $casts = [
        'likes' => 'boolean',
        'anonymous' => 'boolean',
        'comments' => 'boolean',
        'created_at' => 'datetime:Y-m-d H:i'
    ];

    protected $fillable = [
        'title',
        'content',
        'summary',
        'user_id',
        'cover_url',
        'reading_time',
        'can_comment',
        'is_anonymous',
        'is_featured',
    ];
}
