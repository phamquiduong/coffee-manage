<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use Illuminate\Http\Request;

class MyUserController extends Controller
{
    function login_get()
    {
        $isExistUser = MyUser::all()->count() != 0;
        return view('login', ['isExistUser' => $isExistUser]);
    }

    function login_post(Request $request)
    {
        $request->validate([
            'phone_number' => 'required',
        ]);
        return view('login', ['phoneNumber' => $request->phone_number]);
    }
}
