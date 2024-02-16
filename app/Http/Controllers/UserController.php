<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Web Method
    public function index()
    {
        $users = User::orderBy('name', 'asc')->paginate(9);
        return view('users.index', [
            'users' => $users,
        ]);
    }
}
