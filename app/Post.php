<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = [ 'username', 'content'];

    public function comments() {
		return $this->hasMany(Comment::class);
	}

    public function getThreadedComments() {
		return $this->comments()->get()->threaded();
	}

	public function addComment($attributes) {
		$comment = (new Comment())->forceFill($attributes);
		return $this->comments()->save($comment);
	}
}
