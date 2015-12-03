<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Nht\Http\Requests;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Hocs\Categories\CategoryCreatorListener;
use Nht\Hocs\Categories\CategoryUpdaterListener;
use Nht\Hocs\Categories\CategoryDeleterListener;
use Nht\Hocs\Categories\Category;
use Nht\Hocs\Categories\CategoryCreator;
use Nht\Hocs\Categories\CategoryUpdater;
use Nht\Hocs\Categories\CategoryRepository;
use Nht\Hocs\Categories\CategoryDeleter;
use Nht\Http\Requests\AdminCategoryRequest;

/**
 * Class CategoryController.
 *
 * @author  SaturnLai
 */

class CategoryController extends AdminController implements CategoryCreatorListener, CategoryUpdaterListener, CategoryDeleterListener
{
	protected $category;
	protected $creator;
	protected $type;
	protected $updater;
	protected $deleter;

	public function __construct(CategoryRepository $category, CategoryCreator $creator, CategoryUpdater $updater, CategoryDeleter $deleter)
	{
		$this->category = $category;
		$this->creator  = $creator;
		$this->updater  = $updater;
		$this->deleter  = $deleter;
		$this->type 	 = $category->getListTypeByCategory();
		parent::__construct();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$type       = $this->type;
		$category 	= $this->category->getListCategories(false, $request->all());
		return view('admin/categories/index', compact('category', 'type'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$type       = $this->type;
		$categories = $this->category->getAllCategories(false);
		return view('/admin/categories/create', compact('type', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminCategoryRequest $request)
	{
		return $this->creator->createCategory($this, $request->all());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$category   = $this->category->getById($id);
		$categories = $this->category->getAllCategories(false);
		$type       = $this->type;
		return view('admin/categories/edit', compact('type', 'category', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, AdminCategoryRequest $request)
	{
		$category   = $this->category->getById($id);
		return $this->updater->updateCategory($this, $request->except('_token'), $category);
	}

	/**
	 * Update the active category in storage
	 * @param  int  $id
	 * @return Response
	 */

	public function active($id)
	{
		$category   = $this->category->getById($id);
		return $this->updater->toggleActiveStatus($this, $category);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$category   = $this->category->getById($id);
		return $this->deleter->deleteCategory($this, $category);
	}

	/**
	 * Thông báo lỗi cho toàn controller
	 */
	public function creationSuccess() {
		return redirect()->route('category.index')->with('success', 'Tạo mới danh mục thành công');
	}

	public function creationFailed() {
		return redirect()->back()->withInputs()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau');
	}

	public function updationSuccess() {
		return redirect()->route('category.index')->with('success', 'Cập nhật danh mục thành công');
	}

	public function updationFailed() {
		return redirect()->back()->withInputs()->with('error', 'Có lỗi xảy ra, vui lòng thử lại sau');
	}

	public function deletionSuccess() {
		return redirect()->route('category.index')->with('success', 'Xóa thành công danh mục');
	}

	public function deletionFailed() {
		return redirect()->back()->withInputs()->with('error', 'Có lỗi xảy ra, xóa danh mục không thành công');
	}

	public function toggleActiveStatusSuccess(Category $category) {
		return [
			'code'   => 1,
			'status' => $category->getStatus()
		];
	}

	public function toggleActiveStatusFailed() {
		return [
			'code'    => 0,
			'message' => 'Kích hoạt thất bại'
		];
	}
}
