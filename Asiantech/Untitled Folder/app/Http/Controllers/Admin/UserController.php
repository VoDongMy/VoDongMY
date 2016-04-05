<?php

namespace app\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Admin\Role;
use App\Admin\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_user = User::with('roles')->get();

        return view('admin.user.user', compact('list_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $list_role = $role->selectBoxRole();

        return view('admin.user.createuser', compact('list_role'));
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
        $user_id = $request->input('user_id');
        $user = new User();
        $results = $user->saveData($request, $user_id);
        if (!$results) {
            return redirect()->route('cpanel.user.index')
                        ->with('status', 'fail')
                        ->with('msg', 'Can not save data.');
        } else {
            return redirect()->route('cpanel.user.index')
                            ->with('status', 'success')
                            ->with('msg', 'Successfully !');
        }
    }

    /**
     * Display the form for change password.
     */
    public function changepw()
    {
        return view('admin.user.changepw');
    }

    /**
     * Change password.
     */
	public function updatepw(Request $request)
    {
        $crpassword = $request->input('crpassword');
        $user_id = Auth::id();
        $info_user = User::find($user_id);
        $old_password = $info_user->password;
        if (Hash::check($crpassword, $old_password)) {
            $user = new User();
            $affect_row = $user->changePassword($request, $user_id);
            echo 'true';
        } else {
            echo 'false';
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
        $role = new Role();
        $user = new User();
        $user_id = $request->route('user');
        $info_user = $user->find($user_id);

        // $info = $info_user->roles()->get();
        if ($info_user) {
            $array_role = array();
            foreach ($info_user->roles as $role) {
                $array_role[] = $role->pivot->role_id;
            }
            $list_role = $role->selectBoxRole($array_role);

            return view('admin.user.updateuser', compact('list_role', 'info_user'));
        } else {
            return redirect()->route('cpanel.user.index')
                        ->with('status', 'fail')
                        ->with('msg', 'User not available.');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
