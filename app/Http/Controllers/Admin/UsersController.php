<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Hash;
use Auth;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('backEnd.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        return view('backEnd.admin.users.create')
        ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|string|email|max:255|unique:users', 'password' => 'required|string|min:6', 'roles' => 'required|min:1']);
        // hash password
        $request->merge(['password' => bcrypt($request->get('password'))]);

        // Create the user
        if ($user = User::create($request->except('roles', 'permissions'))) {
            $this->syncPermissions($request, $user);

            Session::flash('message', 'Usuario agregado.');
            Session::flash('status', 'success');
        } else {
            Session::flash('message', 'Usuario agregado.');
            Session::flash('status', 'success');
        }

        return redirect('admin/users');
    }

    /**
    * Sync roles and permissions
    *
    * @param Request $request
    * @param $user
    * @return string
    */
    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if (! $user->hasAllRoles($roles)) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('backEnd.admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::all('name', 'id');

        return view('backEnd.admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['name' => 'required', 'email' => 'required|email|unique:users,email,' . $id, 'roles' => 'required|min:1']);

        // Get the user
        $user = User::findOrFail($id);

        // Update user
        $user->fill($request->except('roles', 'permissions', 'password'));

        // check for password change
        if ($request->get('password')) {
            $user->password = bcrypt($request->get('password'));
        }

        // Handle the user roles
        $this->syncPermissions($request, $user);

        $user->save();

        Session::flash('message', 'Usuario actualizado.');
        Session::flash('status', 'success');

        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            Session::flash('message', 'La eliminación del usuario actualmente conectado no está permitida :(');
            Session::flash('status', 'success');
            return redirect()->back();
        }

        if (User::findOrFail($id)->delete()) {
            Session::flash('message', 'Usuario eliminado.');
            Session::flash('status', 'success');
        } else {
            Session::flash('message', 'Usuario no eliminado.');
            Session::flash('status', 'success');
        }

        return redirect()->back();
    }

    public function profile()
    {
        $user = Auth::user();
        return view('backEnd.admin.users.profile')
      ->with('user', $user);
    }

    public function updateProfile(Request $request)
    {
        $this->validate($request, ['password' => 'required|string|min:6|confirmed', ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        Session::flash('message', 'Actualizaste tu contraseña exitosamente.');
        Session::flash('status', 'success');
        return redirect()->back();
    }

}
