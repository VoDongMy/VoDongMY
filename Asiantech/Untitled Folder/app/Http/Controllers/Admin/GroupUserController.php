<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Router;
use App\Admin\Role;
use App\Admin\Permission;

class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Role $role)
    {
        $roles = $role->get();

        return view('admin.user.group', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Router $router)
    {
        // $modules  = Module::get();

        return view('admin.user.newgroup', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles = new Role();
        $role_id = $request->input('role_id', '');
        $results_role = $roles->saveData($request, $role_id);
        $info_role = $roles->find($results_role);
        // Delete all old permissions
        $delete_permission = $info_role->permissions()->delete();
        // Detact all pivot And Remove all permission off group
        $detact = $info_role->permissions()->detach();
        if (!$results_role) {
            return redirect()->route('cpanel.groupuser.index')
                            ->with('status', 'fail')
                            ->with('msg', 'Can not save data.');
        } else {
            // Add permission
            $role_id = $role_id ? $role_id : $results_role;
            $permissions = new Permission();
            $results = $permissions->saveData($request, $role_id);
            if (!$results) {
                return redirect()->route('cpanel.groupuser.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not save data.');
            } else {
                return redirect()->route('cpanel.groupuser.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $role_id = $request->route('groupuser');
        $roles = new Role();
        $role = $roles->find($role_id);
        if ($role) {
            $delete_permission = $role->permissions()->delete();
            $detact = $role->permissions()->detach();
            $detact = $role->users()->detach();
            $results = $roles->find($role_id)->delete();
            if (!$results) {
                return redirect()->route('cpanel.groupuser.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not delete data.');
            } else {
                return redirect()->route('cpanel.groupuser.index')
                                ->with('status', 'success')
                                ->with('msg', 'Successfully!');
            }
        } else {
            return redirect()->route('cpanel.groupuser.index')
                                ->with('status', 'fail')
                                ->with('msg', 'Can not delete data.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $modules = Module::get();
        $role_id = $request->route('groupuser');
        $roles = new Role();
        $role = $roles->find($role_id);
        $permission = $role->permissions()->get();
        $array_permission = array();
        foreach ($permission as $key => $value) {
            $array_permission[] = $value->permission_slug;
        }

        return view('admin.user.updategroup', compact('modules', 'role', 'array_permission'));
    }
}
