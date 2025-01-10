<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index
    public function index()
    {
        $users = User::when(request()->search, function ($query) {
                $query->whereAny(['name', 'email'], 'like', '%' . request()->search . '%');
            })
            ->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        return inertia('User/Index', [
            'users' => $users,
            'search_key'=>request()->search,
        ]);
    }
}
