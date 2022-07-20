<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function scopePopular($query) {
        return $query
            ->where('like_count', '>', 50000)
            ->orWhere('view_count', '>', 500000);
    }
}
