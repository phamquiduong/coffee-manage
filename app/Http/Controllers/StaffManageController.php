<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MyUser;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class StaffManageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $account = $request->cookie('phone_number');
        if (isset($account)) {
            $user = MyUser::where('phone_number', $account)->first();
            if ($user->role != 'owner') return redirect('/');
        }

        return view('owner.staffmanage', ['users' => MyUser::all()->where('role', '=', 'staff')->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->merge(
            ['phone_number' => str_replace(' ', '', str_replace('+84', '0', $request->phone_number))]
        );
        $request->validate([
            'phone_number' => ['required', 'unique:my_users,phone_number', new PhoneNumber],
            'full_name' => ['required',],
            'password' => ['required'],
        ]);
        $phone_number = $request->phone_number;
        $full_name = $request->full_name;
        $password = $request->password;

        MyUser::create([
            'phone_number' => $phone_number,
            'full_name' => $full_name,
            'password' => md5($password),
            'role' => 'staff'
        ]);

        return redirect('/users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->merge(
            ['phone_number' => str_replace(' ', '', str_replace('+84', '0', $request->phone_number))]
        );
        $request->validate([
            'phone_number' => ['required', new PhoneNumber],
            'full_name' => ['required']
        ]);
        $phone_number = $request->phone_number;
        $full_name = $request->full_name;


        MyUser::where('phone_number', '=', $id)->update([
            'phone_number' => $phone_number,
            'full_name' => $full_name
        ]);
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MyUser::where('phone_number', '=', $id)->delete();
        return redirect('/users');
    }
}
