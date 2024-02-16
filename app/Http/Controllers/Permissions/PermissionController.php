<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        $permission = new Permission;
        return view('rap.permissions.index', compact('permissions', 'permission'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|min:3|max:25|unique:permissions,name',
            'guard_name' => 'required|in:web,api',
        ]);
        Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);
        session()->flash('status', 'New permission was crearted');
        return back();
    }

    public function edit(Permission $permission)
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('rap.permissions.edit', [
            'permission' => $permission
        ], compact('permissions'));
    }

    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required|min:3|max:25|unique:permissions,name,' . $permission->id,
            'guard_name' => 'required|in:web,api',
        ]);
        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        session()->flash('status', 'The permission was updated');
        return redirect()->route('permission.index');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        session()->flash('status', 'The permission was deleted');
        return redirect()->route('permission.index');
    }
}
