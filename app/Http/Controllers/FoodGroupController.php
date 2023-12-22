<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FoodGroup;
use Illuminate\Http\Request;
use App\Models\MyUser;


class FoodGroupController extends Controller
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

        return view('owner.foodsgroups',['foodgroups' => FoodGroup::all()->sortByDesc('id')]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required',],
        ]);
        $name = $request->name;

        FoodGroup::create([
            'name' => $name,
        ]);

        return redirect('/foods_groups');
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
        $request->validate([
            'name' => ['required',]
        ]);
        $name = $request->name;

        FoodGroup::where('id', '=', $id)->update([
            'name' => $name
        ]);
        return redirect('/foods_groups');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FoodGroup::where('id', '=', $id)->delete();
        return redirect('/foods_groups');
    }
}
