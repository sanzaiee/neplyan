<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


// use Spatie\Permission\Contracts\Permission;
// use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:browse_role')->only('index');
        $this->middleware('permission:create_role')->only(['create', 'store']);
        $this->middleware('permission:read_role')->only('edit');
        $this->middleware('permission:update_role')->only('update');
        $this->middleware('permission:delete_role')->only('destroy');
    }

    public function index()
    {
        $roles = Role::get();
        return view('dashboard.role.index', compact('roles'));
    }

    public function create()
    {
        $employeePermission = Permission::where('table_name', 'employee')->get();
        $rolePermission = Permission::where('table_name', 'roles')->get();
        $userPermission = Permission::where('table_name', 'users')->get();

        $productPermission = Permission::where('table_name', 'products')->get();
        $topicPermission = Permission::where('table_name', 'topics')->get();
        $topicContentsPermission = Permission::where('table_name', 'topic_contents')->get();
        // $settingPermission = Permission::where('table_name', 'settings')->get();
        // $contactPermission = Permission::where('table_name', 'contacts')->get();
        // $subscriberPermission = Permission::where('table_name', 'subscribers')->get();
        $sellerPermission = Permission::where('table_name', 'clients')->orwhere('table_name', 'orders')->get();

        return view('dashboard.role.role', compact(
            'productPermission',
            'topicPermission',
            'topicContentsPermission',
            'rolePermission',
            'userPermission',
            'employeePermission',
            'sellerPermission'

            // 'settingPermission',
            // 'contactPermission',
            // 'subscriberPermission'
        ));
    }

    public function store()
    {
        // return request();
        $this->validate(request(), [
            'name' => 'required|unique:roles|max:255',
        ]);

        $role = Role::create(request()->all());

        $role->givePermissionTo(request('permissions'));

        // $permissionIds = request('permissions');
        // if ($permissionIds !== null) {
        //     foreach ($permissionIds as $permission) {
        //         $role->givePermissionTo($permission);
        //     }
        // }

        return redirect(route('role.index'))->with('success', 'Role Created Successfully!');
    }

    public function edit($id)
    {
        $role = Role::where('id', $id)->first();

        $employeePermission = Permission::where('table_name', 'employee')->get();

        $productPermission = Permission::where('table_name', 'products')->get();
        $topicPermission = Permission::where('table_name', 'topics')->get();
        $topicContentsPermission = Permission::where('table_name', 'topic_contents')->get();
        $userPermission = Permission::where('table_name', 'users')->get();
        $sellerPermission = Permission::where('table_name', 'clients')->orwhere('table_name', 'orders')->get();


        $rolePermission = Permission::where('table_name', 'roles')->get();

        $permissionSelected = $role->getAllPermissions();

        return view('dashboard.role.role', compact(
            'role',
            'rolePermission',
            'productPermission',
            'topicPermission',
            'topicContentsPermission',
            'permissionSelected',
            'userPermission',
            'employeePermission',
            'sellerPermission'

        ));
    }

    public function update($id)
    {
        $this->validate(request(), ['name' => 'required']);
        $role = Role::where('id', $id)->first();
        $role->update(['name' => request('name')]);

        $role->permissions()->sync(request('permissions'));

        // $role->permissions()->detach();
        // $permissionId = request('permissions');

        // if ($permissionId !== null) {
        //     foreach ($permissionId as $permission) {
        //         $role->givePermissionTo($permission);
        //     }
        // }

        return redirect(route('role.index'))->with('success', 'Role Updated Successfully!');
    }

    public function destroy($id)
    {
        Role::where('id', $id)->delete();
        return redirect(route('role.index'))->with('success', 'Role Deleted Successfully!');
    }
}
