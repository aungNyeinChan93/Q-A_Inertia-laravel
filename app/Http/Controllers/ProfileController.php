<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //edit
    public function edit(){
        return Inertia::render('Profile/Edit');
    }
}
