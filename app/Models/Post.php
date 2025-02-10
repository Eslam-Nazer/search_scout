<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\CommentPivot;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    public static function newFactory()
    {
        return PostFactory::new();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class, 'comments');
    }
}
