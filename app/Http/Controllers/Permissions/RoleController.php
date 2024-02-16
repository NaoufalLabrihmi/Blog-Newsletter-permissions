<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->get();
        $role = new Role;
        return view('rap.roles.index', [
            'roles' => $roles,
            'role' => $role
        ]);
    }

    public function store()
    {
        request()->validate([
            'name' => 'required|min:3|max:25|unique:roles,name',
            'guard_name' => 'required|in:web,api'
        ]);
        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);
        session()->flash('status', 'New role was crearted');
        return back();
    }

    public function edit(Role $role)
    {
        $roles = Role::orderBy('name', 'asc')->get();
        return view('rap.roles.edit', [
            'roles' => $roles,
            'role' => $role,
        ]);
    }

    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required|min:3|max:25|unique:roles,name,' . $role->id,
            'guard_name' => 'required|in:web,api',
        ]);
        $role->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        session()->flash('status', 'The role was updated');
        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('status', 'The role was deleted');
        return redirect()->route('role.index');
    }
}
