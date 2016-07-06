<?php

namespace Nht\Http\Controllers\Admin;


use Nht\Hocs\Entrusts\RoleRepository;
use Nht\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use Nht\Http\Requests\AdminUserFormRequest;
use Nht\Http\Requests\AdminPasswordFormRequest;
use Hash, Xss, Auth;


use Nht\Hocs\Users\User;
use Nht\Hocs\Users\UserRepository;
use Nht\Hocs\Users\UserCreator;
use Nht\Hocs\Users\UserCreatorListener;
use Nht\Hocs\Users\UserUpdater;
use Nht\Hocs\Users\UserUpdaterListener;


/**
 * Class description.
 *
 * @author  AlvinTran
 */
class UserController extends AdminController implements UserCreatorListener, UserUpdaterListener
{
	protected $user;
	protected $role;

	public function __construct(UserRepository $user, RoleRepository $role, UserCreator $creator, UserUpdater $updater)
	{
		$this->user    = $user;
		$this->role    = $role;
		$this->creator = $creator;
		$this->updater = $updater;
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
		$request->get('name') ? $filter['name'] = $request->get('name') : false;
		$request->get('email') ? $filter['email'] = $request->get('email') : false;
		$request->get('phone') ? $filter['phone'] = $request->get('phone') : false;

		// soft
		$sort = ['created_at' => 'DESC'];
		$request->get('field_sort') && $request->get('type_sort') ? $sort = [$request->get('field_sort') => $request->get('type_sort')] : false;

      $users = $this->user->getWithFilter($filter, false, false, $sort, 20);
		return view('admin/users/index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$roles = $this->role->getAll();
		return view('admin/users/create', compact('roles'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminUserFormRequest $request)
	{
		return $this->creator->createUser($this, $request->all());
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Không cho edit tài khoản superadmin
		if ($id == 1)
		{
			abort(403);
		}
		$user = $this->user->getById($id);
		$roles = $this->role->getAll();
		$user_roles = array_pluck($user->roles, 'id');
		return view('admin/users/edit', compact('user', 'roles', 'user_roles'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, AdminUserFormRequest $request)
	{
		// Không cho edit tài khoản superadmin
		if ($id == 1)
		{
			abort(403);
		}
		$user = $this->user->find($id);
		return $this->updater->updateUser($this, $user, $request->all());
	}

	public function password() {
		return view('admin/users/password');
	}

	public function changePassword(AdminPasswordFormRequest $request) {
		if (Hash::check($request->get('old_password'), Auth::user()->password)){
			$data['password'] = Hash::make(Xss::clean($request->get('password')));
			//return redirect()->route('user.password')->with('success', trans('general.messages.update_success'));
			Auth::logout();
			return back()->withInput()->with(['message' => 'Đổi mật khẩu thành công, đăng nhập lại để tiếp tục']);
		}
		return redirect()->back()->with('error', 'Mật khẩu không đúng');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function profile()
	{
		$user = Auth::user();
		return view('admin/users/profile', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @return Response
	 */
	public function updateProfile(AdminUserFormRequest $request)
	{
		$user = Auth::user();
		return $this->updater->updateUser($this, $user, $request->except('email', 'password', 'role[]'), true);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if ($this->user->delete($id))
		{
			return redirect()->route('user.index')->with('success', trans('general.messages.delete_success'));
		}
		return redirect()->route('user.index')->with('error', trans('general.messages.delete_fail'));
	}

	public function creationSuccess(User $user) {
		return redirect()->route('user.create')->with('success', trans('general.messages.create_success'));
	}

	public function creationFailed() {
		return redirect()->back()->withInputs()->with('error', trans('general.messages.create_fail'));
	}

	public function updationSuccess(User $user, $profile = false) {
		if($profile == false) {
			return redirect()->route('user.edit', $user->getId())->with('success', trans('general.messages.update_success'));
		}
		return redirect()->route('user.profile')->with('success', trans('general.messages.update_success'));
	}

	public function updationFailed() {
		return redirect()->back()->withInputs()->with('error', trans('general.messages.update_fail'));
	}

	public function active($id) {
		// Không cho edit tài khoản superadmin
		if ($id == 1)
		{
			abort(403);
		}
		$user = $this->user->find($id);
		$user->active = !$user->active;
		if($user->save()) {
		   return [
		       'code' => 1,
		       'messages' => 'Cập nhật thành công',
		       'status' => $user->active
		   ];
		}
		return ['code' => 0, 'messages' => 'Cập nhật thất bại'];
	}
}