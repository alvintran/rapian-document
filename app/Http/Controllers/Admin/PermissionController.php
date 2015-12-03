<?php

namespace Nht\Http\Controllers\Admin;

use Nht\Hocs\Entrusts\RoleRepository;
use Nht\Http\Requests\AdminPermissionFormRequest;
use Nht\Hocs\Entrusts\PermissionRepository;
use Nht\Http\Controllers\Admin\AdminController;

class PermissionController extends AdminController
{
	protected $role;
	protected $perm;

	public function __construct(RoleRepository $role, PermissionRepository $perm)
	{
		$this->role = $role;
		$this->perm = $perm;
		parent::__construct();
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$permissions = $this->perm->getAllWithPaginate();
		return view('admin/permissions/index', compact('permissions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin/permissions/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AdminPermissionFormRequest $request)
	{
		if ($perm = $this->perm->create($request->all()))
		{
		   return redirect()->route('permission.create')->with('success', trans('general.messages.create_success'));
		}
		return redirect()->back()->withInputs()->with('error', trans('general.messages.create_fail'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$permission = $this->perm->getById($id);
      return view('admin/permissions/edit', compact('permission'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, AdminPermissionFormRequest $request)
	{
		if ($this->perm->update($request->except('_token'), ['id' => $id]))
      {
         return redirect()->route('permission.edit', $id)->with('success', trans('general.messages.update_success'));
      }
      return redirect()->back()->withInputs()->with('error', trans('general.messages.update_fail'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if ($this->perm->delete($id))
      {
         return redirect()->route('permission.index')->with('success', trans('general.messages.delete_success'));
      }
      return redirect()->route('permission.index')->with('error', trans('general.messages.delete_fail'));
	}
}
