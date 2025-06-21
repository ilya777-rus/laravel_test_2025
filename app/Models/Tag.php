<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);

    }
}
