<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo {
        return $this->belongsTo(Author::class);
    }
}
