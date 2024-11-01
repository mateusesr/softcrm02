<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('city.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
        ]);

        City::create($request->all());

        return redirect()->route('city.index')->with('success', 'Cidade criada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        return view('city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        return view('city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
        ]);

        $city->update($request->all());

        return redirect()->route('city.index')->with('success', 'Cidade atualizada com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('city.index')->with('success', 'Cidade excluída com sucesso.');
    }
}
