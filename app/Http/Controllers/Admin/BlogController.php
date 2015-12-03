<?php

namespace Nht\Http\Controllers\Admin;

use Nht\Hocs\Blogs\BlogRepository;
use Nht\Hocs\Categories\CategoryRepository;
use Nht\Hocs\Users\UserRepository;
use Illuminate\Http\Request;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Http\Requests\AdminBlogFormRequest;

use Nht\Hocs\Blogs\Blog;
use Nht\Hocs\Categories\Category;
use Nht\Hocs\Blogs\BlogCreator;
use Nht\Hocs\Blogs\BlogCreatorListener;
use Nht\Hocs\Blogs\BlogUpdater;
use Nht\Hocs\Blogs\BlogUpdaterListener;
use Entrust;

class BlogController extends AdminController implements BlogCreatorListener, BlogUpdaterListener {

    protected $blog;
    protected $category;
    protected $creator;

    public function __construct(UserRepository $user, BlogRepository $blog, CategoryRepository $category, BlogCreator $creator, BlogUpdater $updater)
    {
        $this->blog = $blog;
        $this->category = $category;
        $this->creator = $creator;
        $this->updater = $updater;
        $this->user = $user;
        // $this->categories = $this->category->getAllCategories(false, ['type' => Category::NEWS]);
        $this->image = \App::make('ImageFactory');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        // filter
        $filter = [];
        $request->get('title') ? $filter['title'] = $request->get('title') : false;

        $where = [];
        $request->get('category') ? $where['category_id'] = $request->get('category') : false;

        $sort = [];
        $request->get('field_sort') && $request->get('type_sort') ? $sort = [$request->get('field_sort') => $request->get('type_sort')] : false;

        $blogs = $this->blog->getWithFilter($filter, $where, false, $sort, 20);
        $categories = $this->category->getAllCategories(false, ['type' => Category::NEWS]);
        return view('admin/blogs/index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->getAllCategories(false, ['type' => Category::NEWS]);
        return view('admin/blogs/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(AdminBlogFormRequest $request)
    {
        return $this->creator->createBlog($this, $request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $blog = $this->blog->getById($id);
        $categories = $this->category->getAllCategories(false, ['type' => Category::NEWS]);
        return view('admin/blogs/edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, AdminBlogFormRequest $request)
    {
        $blog = $this->blog->find($id);
        return $this->updater->updateBlog($this, $blog, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $thisBlog = $this->blog->find($id);
        if($this->blog->saveTag($thisBlog, false))
        {
            if ($this->blog->delete($id))
            {
                return redirect()->route('blog.index')->with('success', trans('general.messages.delete_success'));
            } else {
                return redirect()->route('blog.index')->with('error', 'Xóa tags của blog thành công, xóa blog thất bại');
            }
        }
        return redirect()->route('blog.index')->with('error', trans('general.messages.delete_fail'));
    }

    public function active($id) {
        $blog = $this->blog->find($id);
        $blog->active = !$blog->active;
        if($blog->save()) {
            return [
                'code' => 1,
                'messages' => 'Cập nhật thành công',
                'status' => $blog->active
            ];
        }
        return ['code' => 0, 'messages' => 'Cập nhật thất bại'];
    }

    public function hot($id) {
        $blog = $this->blog->find($id);
        $blog->hot = !$blog->hot;
        if($blog->save()) {
            return [
                'code' => 1,
                'messages' => 'Cập nhật thành công',
                'status' => $blog->hot
            ];
        }
        return ['code' => 0, 'messages' => 'Cập nhật thất bại'];
    }

    public function creationSuccess(Blog $blog) {
        return redirect()->route('blog.create')->with('success', trans('general.messages.create_success'));
    }

    public function creationFailed() {
        return redirect()->back()->withInputs()->with('error', trans('general.messages.create_fail'));
    }

    public function updateSuccess(Blog $blog) {
        return redirect()->route('blog.edit', $blog->id)->with('success', trans('general.messages.create_success'));
    }

    public function updateFailed() {
        return redirect()->back()->withInputs()->with('error', trans('general.messages.create_fail'));
    }
}
