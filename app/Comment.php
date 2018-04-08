<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $fillable = ['username', 'content'];

    public function newCollection(array $models = []) {
        return new CommentCollection($models);
    }
}
