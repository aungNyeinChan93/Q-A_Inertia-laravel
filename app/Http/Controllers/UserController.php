<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index
    public function index(){
        $users = User::query()->orderBy('created_at','desc')->paginate(10);
        return inertia('User/Index',[
            'users'=>$users,
        ]);
    }
}
