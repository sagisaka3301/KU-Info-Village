<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'undergra',
        'type',
        'class_name',
        'in_charge',
        'evaluation',
        'comment',
        'post_user',
    ];
}
