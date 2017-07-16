<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'body',
        'user_id',
    ];

    /**
     * Returns the author of the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Returns the title with uppercase first
     *
     * @return string
     */
    public function getTitleAttribute($title)
    {
        return ucfirst($title);
    }
}
