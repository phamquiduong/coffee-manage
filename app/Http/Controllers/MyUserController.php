<?php

namespace App\Http\Controllers;

use App\Models\MyUser;
use App\Rules\PhoneNumber;
use Exception;
use Illuminate\Http\Request;

class MyUserController extends Controller
{
    function login_get(Request $request)
    {
        $account = $request->cookie('phone_number');
        if (isset($account)) {
            $user = MyUser::where('phone_number', $account)->first();
            switch ($user->role) {
                case 'owner':
                    return view('owner.index');
                case 'staff':
                    return view('staff.index');
                case 'guest':
                    return view('guest.index');
            }
        }

        $isExistUser = MyUser::all()->count() != 0;
        return view('login', ['isExistUser' => $isExistUser]);
    }

    function login_post(Request $request)
    {
        $request->validate([
            'phone_number' => ['required', new PhoneNumber],
        ]);

        $phone_number = $request->phone_number;
        $password = $request->password;
        $user = MyUser::where('phone_number', $phone_number)->first();
        $isFirstUser = MyUser::all()->count() == 0;

        $context = ['phoneNumber' => $phone_number, 'password' => $password, 'isExistUser' => !$isFirstUser];

        if (isset($password)) {
            // Create owner account for first login
            if ($isFirstUser) {
                MyUser::create(['phone_number' => $phone_number, 'password' => md5($password), 'role' => 'owner']);
                return response(view('owner.index'))->cookie('phone_number', $phone_number);
            }

            // Check password for user
            if (md5($password) != $user->password) return view('login', $context + ['error' => 'password mismatch']);

            // Return page for owner or satff user
            if ($user->role == 'owner') return response(view('owner.index'))->cookie('phone_number', $phone_number);
            return response(view('staff.index'))->cookie('phone_number', $phone_number);
        } else {
            if (isset($user)) {
                if ($user->role == 'guest') return view('guest.index');
                else return view('login', $context + ['requestPassword' => true]);
            } else {
                if ($isFirstUser) return view('login', $context + ['requestPassword' => true]);
                else {
                    MyUser::create(['phone_number' => $phone_number, 'password' => md5($password), 'role' => 'guest']);
                    return response(view('guest.index'))->cookie('phone_number', $phone_number);
                }
            }
        }
    }
}
