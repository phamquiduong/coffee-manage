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
        return view('owner.foods', ['foods' => Food::all()->sortByDesc('is_active')]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => ['required',],
            'money' => ['required'],
        ]);
        $name = $request->name;
        $money = $request->money;

        Food::create([
            'name' => $name,
            'money' => $money,
            'is_active' => true,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
