<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;
    protected $with = ['user:id,name,image', 'comments.user:id,name,image'];
    protected $fillable = [

        'content',
        'user_id',


    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->belongsToMany(User::class, 'post_likes')->withTimestamps();
    }
}
