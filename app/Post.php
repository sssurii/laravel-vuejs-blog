<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'user_id',
        'meta',
        'status',
        'published_at',
        'deleted_at'
    ];

    protected $casts = [
        'meta' => 'json',
    ];

    public function list()
    {
        return $this->orderBy('published_at', 'desc')
                    ->get();
    }

    public function findById(int $id)
    {
        return $this->whereId($id)->first();
    }
}
