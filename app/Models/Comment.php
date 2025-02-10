<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Comment extends Model
{
    use HasFactory, Searchable;

    protected $table = "comments";

    protected $primaryKey = "id";

    protected $fillable = [
        'id',
        'comment',
        'user_id',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray()
    {
        return [
            'comment' => $this->comment,
            // 'user_id'=> $this->user->id,
            'useremail' => $this->user->email,
            'username'   => $this->user->name,
            'title'  => $this->post->title,
            'description' => $this->post->description,
        ];
    }
}
