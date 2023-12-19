<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\FoodGroup;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('owner.foods-manager', [
            'foods' => Food::all()->sortByDesc('is_active'),
            'food_groups' => FoodGroup::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required',],
            'money' => ['required'],
            'food_group' => ['required'],
        ]);
        $name = $request->name;
        $money = $request->money;
        $food_group = $request->food_group;

        Food::create([
            'name' => $name,
            'money' => $money,
            'is_active' => true,
            'group_id' => $food_group
        ]);

        return redirect('/foods');
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
            'name' => ['required'],
            'money' => ['required'],
            'food_group' => ['required'],
        ]);
        $name = $request->name;
        $money = $request->money;
        $is_active = isset($request->is_active);
        $food_group = $request->food_group;

        Food::where('id', '=', $id)->update([
            'name' => $name,
            'money' => $money,
            'is_active' => $is_active,
            'group_id' => $food_group
        ]);
        return redirect('/foods');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Food::where('id', '=', $id)->delete();
        return redirect('/foods');
    }
}
