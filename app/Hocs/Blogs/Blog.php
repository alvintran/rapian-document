<?php

namespace Nht\Hocs\Blogs;

use Illuminate\Database\Eloquent\Model;
use Str;

class Blog extends Model
{
   /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['title', 'teaser', 'image', 'content', 'active', 'hot', 'category_id', 'user_id', 'slug', 'tags'];

    //active
    const ACTIVE = 1;
    const NOACTIVE = 0;

    //hot
    const HOT = 1;
    const NOHOT = 0;

    //tags
    public function SyncTags() {
        return $this->belongsToMany('Nht\Hocs\Tags\Tag', 'blog_tag', 'blog_id');
    }

    public function getThumbnail($resize = '') {
    	return $this->image != null ? PATH_BLOG_THUMBNAIL.$resize.$this->image : '/images/default.png';
    }

    public function getUrl() {
        return route('frontend.blog', [$this->id, $this->slug]);
    }

    public function getHot() {
        return $this->hot;
    }

    public function getActive() {
        return $this->active;
    }

    public function getTags() {
        $tag_list = [];
        foreach($this->SyncTags as $tag) {
            $tag_list[] = '<a href="/tags/'.$tag->slug.'" class="tag-content">'.$tag->tag.'</a>';
        }
        return implode('', $tag_list);
    }

    public function author() {
        return $this->belongsTo('Nht\Hocs\Users\User', 'user_id');
    }

    public function category() {
        return $this->belongsTo('Nht\Hocs\Categories\Category', 'category_id');
    }

    /**
     * - lấy checked của checkbox của blog hot
     * @return string
     */
    public function showCheckHot() {
        switch($this->getHot()) {
            case self::HOT:
                echo '<i class="fa fa-check-square"></i>';
                break;
            default:
                echo '<i class="fa fa-square"></i>';
                break;
        }
    }

    /**
     * - lấy checked của checkbox của blog đã active
     * @return string
     */
    public function showCheckActive() {
        switch($this->getActive()) {
            case Blog::ACTIVE:
                echo '<i class="fa fa-check-square"></i>';
                break;
            default:
                echo '<i class="fa fa-square"></i>';
                break;
        }
    }


}
