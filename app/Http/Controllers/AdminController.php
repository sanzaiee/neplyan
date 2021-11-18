<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:browse_user')->only('index');
        $this->middleware('permission:create_user')->only(['create', 'store']);
        $this->middleware('permission:read_user')->only('edit');
        $this->middleware('permission:update_user')->only('update');
        $this->middleware('permission:delete_user')->only('destroy');
    }

    public function index()
    {
        $admins = User::get();
        return view('dashboard.user.index', compact('admins'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('dashboard.user.create', compact('roles'));
    }

    public function store(Request $request, User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            // 'username' => 'required|unique:admins|max:255',
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $user = new User();

        $user->name = request('name');
        $user->mobile = request('mobile');
        $user->address = request('address');
        $user->password = Hash::make($request->password);
        $user->email = request('email');
        $user->status = request('status');

        // $user->image = $this->storeImage(request('image'), 'users', 'user');

        $user->save();

        $user->assignRole(request('roles'));

        return redirect(route('admin.index'))->with('success', 'Admin Created Successfully!');
    }

    public function edit($id)
    {
        // $id = $admin->id;
        // if($admin->id !== Auth::guard('admin')->user()->id){
        //     abort(403);
        // }
        $admin = User::where('id', $id)->first();
        $roles = Role::get();
        $roleSelected = $admin->getRoleNames();

        return view('dashboard.user.create', compact('admin', 'roles', 'roleSelected'));
    }

    public function update($id)
    {
        $admin = User::findOrFail($id);

        $this->validate(request(), [
            'name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'status' => 'required',
            // 'username' => 'required|unique:admins,username,' . $id,
            // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required_with:password_confirmation|same:password_confirmation',
        ]);
        // For Password Change
        $password = request('password');
        if ($password != null) {
            User::where('id', $id)->update([
                'password' => Hash::make($password)
            ]);
        }

        $admin->update([
            'name' => request('name'),
            'username' => request('username'),
            'email' => request('email'),
            'status' => request('status'),
            'address' => request('address'),
            'mobile' => request('mobile'),

        ]);

        // return $admin;
        // $admin->image = $this->updateImage(request('image'), 'admins', 'admin', $admin->image);
        $admin->save();

        $admin->syncRoles(request('roles'));

        return redirect(route('admin.index'))->with('success', 'Admin Updated Successfully!');
    }

    public function destroy($id)
    {
        abort_if(auth()->id() != 1, 403);
        if ($id == 1) {
            return redirect(route('admin.index'))->with('error', 'Cannot Delete Super Admin!');
        }
        User::findorFail($id)->delete();
        return redirect(route('admin.index'))->with('success', 'Admin Deleted Successfully!');
    }
}
