<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CommentPivot extends Pivot
{
    protected $table = "comments";

    protected $fillable = [
        "comments.id",
        // 'post_id',
        // 'user_id'
    ];
}
