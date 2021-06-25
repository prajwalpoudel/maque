<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Author extends Model
{
    protected $guarded = ['id'];

    /**
     * @return HasMany
     */
    public function posts():HasMany {
        return $this->hasMany(Post::class, 'author_id', 'id');
    }

}

