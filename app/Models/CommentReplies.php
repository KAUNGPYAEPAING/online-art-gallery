<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentReplies extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comment(){
        return $this->belongsTo(Comment::class);
    }
}
