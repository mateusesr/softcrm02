<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function search(Request $request)
    {
        $query = $request->input('query'); // Termo da pesquisa

        $cities = City::where('name', 'like', "%{$query}%")
            ->orderBy('name')
            ->get();

        return view('city.index', compact('cities'));
    }

    public function index()
    {
        $query = City::query(); // Initialize the query

        $cities = City::all(); // Get paginated cities

        return view('city.index', compact('cities')); // Return the view with cities
    }


    public function create()
    {
        return view('city.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
        ]);
        
        $city = City::create($request->toArray());

        return view("city.create", compact('city')); 
    }



    public function show(City $city)
    {
        return view('city.show', compact('city'));
    }


    public function edit(City $city)
    {
        return view('city.edit', compact('city'));
    }


    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'uf' => 'required|string|max:2',
        ]);

        $city->update($request->all());

        return redirect()->route('city.index')->with('success', 'Cidade atualizada com sucesso.');
    }


    public function destroy(City $city)
    {
        try {
            // Validate the value...
            $result = $city->deleteOrFail();
            print($result);
            return redirect()->route('city.index')->with('message', 'Cidade excluída com sucesso.');

            //return redirect()->route('city.index')->with('error', 'Não foi possível excluir sua cidade.');   

        } catch (\Exception $e) {
            $result = false;
            return redirect()->route('city.index')->with('message', 'Não foi possível excluir sua cidade.');
        } catch (\Exception $e) {
            $result = false;
            return redirect()->route('city.index')->with('message', 'Não foi possível excluir sua cidade.');
            //do something when exception is thrown
        } catch (\Error $e) {
            $result = false;
            return redirect()->route('city.index')->with('message', 'Não foi possível excluir sua cidade.');
            //do something when error is thrown
        } catch (\Throwable $e) {
            $result = false;
            return redirect()->route('city.index')->with('message', 'Não foi possível excluir sua cidade.');
            //do something when Throwable is thrown
        }
    }
}
