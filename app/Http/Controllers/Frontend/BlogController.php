<?php

namespace Nht\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use Nht\Http\Requests;
use Nht\Http\Controllers\Frontend\FrontendController;

use Nht\Hocs\Blogs\BlogRepository;
use Nht\Hocs\Categories\CategoryRepository;
use Nht\Hocs\Tags\TagRepository;
use Nht\Hocs\Users\UserRepository;
use Nht\Hocs\Blogs\Blog;
use Auth;

class BlogController extends FrontendController
{
	public function __construct(UserRepository $user, BlogRepository $blog, CategoryRepository $category, TagRepository $tag)
	{
        $this->blog     = $blog;
        $this->category = $category;
        $this->tag      = $tag;
        $this->user     = $user;
        parent::__construct();
	}

    public function write() {
        return Auth::check() ? redirect()->route('blog.create') : redirect()->route('frontend.login');
    }

    public function get($id) {
    	$blog = $this->blog->getById($id);
        $blogLQ = $this->blog->getLQ($blog->category->id);
        //Metadata
        $this->metadata->setMetaTitle($blog->title.' - Taobao blog');
        $this->metadata->setDescription($blog->teaser);
        $this->metadata->setMetaKeyWord($blog->tags);
    	return view('frontend.blog', compact('blog', 'blogLQ'));
    }

    public function hot() {
        $blogs = $this->blog->getHot(10, 0);
        //Metadata
        $this->metadata->setMetaTitle('Nổi bật - Taobao blog');
        $this->metadata->setDescription('Blog nổi bật trang taobao blog');
        $this->metadata->setMetaKeyWord('taobao blog, taobao, hot, blog, nổi bật');
        return view('frontend.index', compact('blogs'));
    }

    public function tag($slug) {
        $tag = $this->tag->getTagBySlug($slug);
        $blogs = $this->blog->getAllByTagWithPaginate($slug);
        //Metadata
        $this->metadata->setMetaTitle($tag->tag.' - Taobao blog');
        $this->metadata->setDescription('Các blog với tag '.$tag->tag);
        $this->metadata->setMetaKeyWord('Tag, Taobao, Taobao blog');
        return view('frontend.index', compact('blogs'));
    }

    public function category($category) {
        $cat = $this->category->getById($category);
        if($cat->active == Blog::ACTIVE)  {
            $blogs = $this->blog->getAllByCatWithPaginate($category);
        } else {
            $blogs = [];
        }

        //Metadata
        $this->metadata->setMetaTitle($cat->name.' - Taobao blog');
        $this->metadata->setDescription('Các blog của danh mục '.$cat->name);
        $this->metadata->setMetaKeyWord('Danh mục, Taobao, Taobao blog, '.$cat->name);
        return view('frontend.index', compact('blogs'));
    }

    public function author($author) {
        $blogs = $this->blog->getAllByAutWithPaginate($author);
        $aut = $this->user->getById($author);
        //Metadata
        $this->metadata->setMetaTitle($aut->nickname.' - Taobao blog');
        $this->metadata->setDescription('Các blog của tác giả '.$aut->nickname);
        $this->metadata->setMetaKeyWord('Tác giả, Taobao, Taobao blog, '.$aut->nickname);
        return view('frontend.index', compact('blogs'));
    }
}
