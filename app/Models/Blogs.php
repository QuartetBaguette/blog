<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use HasFactory;

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
