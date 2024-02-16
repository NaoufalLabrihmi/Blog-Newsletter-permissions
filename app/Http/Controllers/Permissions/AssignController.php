<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignController extends Controller
{
    // Web
    public function index(Role $role)
    {
        return view('rap.assigns.index', [
            'role' => $role,
            'roles' => Role::orderBy('name', 'asc')->get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('status', "Permission has been assigned to the role {$role->name}");
    }

    public function edit(Role $role)
    {
        return view('rap.assigns.sync', [
            'role' => $role,
            'roles' => Role::orderBy('name', 'asc')->get(),
            'permissions' => Permission::get(),
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role->syncPermissions(request('permissions'));
        return redirect()->route('assign.index')->with('status', 'The permissions has been synced');
    }

    // Api
    public function indexApi(Role $role)
    {
        return view('rap.assignsApi.index', [
            'role' => $role,
            'roles' => Role::orderBy('name', 'asc')->get(),
            'permissions' => Permission::orderBy('name', 'asc')->get(),
        ]);
    }

    public function storeApi()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role = Role::find(request('role'));
        $role->givePermissionTo(request('permissions'));

        return back()->with('status', "Permission has been assigned to the role {$role->name}");
    }

    public function editApi(Role $role)
    {
        return view('rap.assigns.sync', [
            'role' => $role,
            'roles' => Role::orderBy('name', 'asc')->get(),
            'permissions' => Permission::orderBy('name', 'asc')->get(),
        ]);
    }

    public function updateApi(Role $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role->syncPermissions(request('permissions'));
        return redirect()->route('assignApi.index')->with('status', 'The permissions has been synced');
    }
}
