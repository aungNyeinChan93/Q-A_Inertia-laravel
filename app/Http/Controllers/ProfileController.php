<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //edit
    public function edit()
    {
        return Inertia::render('Profile/Edit');
    }

    // update
    public function update(Request $request)
    {

        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'nullable',
        ]);

        $user = User::where('email', $fields['email'])->first();

        $oldImage = $user->image;

        if ($request->hasFile('image')) {

            if (file_exists(public_path('/storage/' . $oldImage)) && $oldImage) {
                unlink(public_path('/storage/' . $oldImage));
            }

            $path = $request->file('image')->store('avators', 'public');
            $fields['image'] = $path;

        }

        $user->update($fields);

        return to_route('users.index')->with('message','Profile Update Success!');

    }
}
