<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

    protected $casts = [
        'likes' => 'boolean',
        'anonymous' => 'boolean',
        'comments' => 'boolean',
    ];

    protected $fillable = [
        'title',
        'text',
        'summary',
        'author',
        'authorID',
        'cover',
        'imageURL',
        'readingTime',
        'comments',
        'anonymous',
        'likes',
        'featured',
    ];
}
