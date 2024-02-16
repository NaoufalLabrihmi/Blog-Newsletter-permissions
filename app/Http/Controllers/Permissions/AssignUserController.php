<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignUserController extends Controller
{
    public function index(Role $role, User $user)
    {
        $roles = Role::orderBy('name', 'asc')->get();
        $users = User::has('roles')->get();
        return view('rap.roleUser.index', compact('roles', 'role', 'users', 'user'));
    }

    public function store()
    {
        request()->validate([
            'email' => 'required|exists:users',
            'role' => 'array|required',
        ]);
        $user = User::where('email', request('email'))->first();
        $user->assignRole(request('role'));
        return back()->with('success', "Role has been assigned to {$user->name}");
    }

    public function edit(Role $role, User $user)
    {
        $roles = Role::orderBy('name', 'asc')->get();
        $users = User::has('roles')->get();
        return view('rap.roleUser.edit', compact('roles', 'role', 'users', 'user'));
    }

    public function update(User $user)
    {
        $user->syncRoles(request('role'));
        return redirect()->route('assign.user.index');
    }
}
