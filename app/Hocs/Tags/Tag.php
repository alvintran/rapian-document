<?php

namespace Nht\Hocs\Tags;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['tag', 'slug'];

    //tags
    public function blogs() {
        return $this->belongsToMany('Nht\Hocs\Blogs\Blog', 'blog_tag', 'tag_id');
    }
}
