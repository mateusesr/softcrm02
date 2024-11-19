<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\City;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Client::with('city');

    
    if ($request->has('status') && $request->status !== '') {
        if ($request->status == 'ativo') {
            $query->where('is_active', true);
        } elseif ($request->status == 'inativo') {
            $query->where('is_active', false);
        }
    }


    if ($request->has('search') && $request->search !== '') {
        $search = $request->search;
        $query->where(function ($subQuery) use ($search) {
            $subQuery->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%");
        });
    }

    $clients = $query->get(); // Obtém os clientes filtrados
    return view('client.index', compact("clients"));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::orderBy('uf')->orderBy('name')->get(); // Ordenando primeiro pela UF e depois pelo nome
        return view('client.create', compact('cities')); // Passando as cidades para a view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = Client::create($request->toArray());

        $cities = City::orderBy('uf')->orderBy('name')->get(); // Adicionando a busca das cidades
        return view("client.create", compact('client', 'cities')); // Passando as cidades para a view
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        $cities = City::orderBy('uf')->orderBy('name')->get(); // Adicionando a busca das cidades
        return view('client.show', compact('client', 'cities')); // Passando as cidades para a view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $cities = City::all(); // Obtém todas as cidades
        return view('client.edit', compact('client', 'cities')); // Passa o cliente e a lista de cidades
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::whereId($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city_id' => $request->city_id
        ]);

        return redirect()->route('client.index')->with('message', 'Cliente atualizado com sucesso!');
    }


    public function destroy(string $id)
{
    $deleted = Client::destroy($id);

    if ($deleted) {
 
        return redirect()->route('client.index');
    } else {

        return redirect()->route('client.index');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function desactivate(string $id)
    {
        $client = Client::findOrFail($id);
        $client->is_active = false; // Define o cliente como inativo
        $client->save(); // Salva as alterações

        return redirect()->route('client.index')->with('message', 'Cliente inativado com sucesso!');
    }

    public function reactivate($id)
    {
        $client = Client::findOrFail($id);
        $client->is_active = true; // Define o cliente como ativo
        $client->save(); // Salva as alterações

        return redirect()->route('client.index')->with('message', 'Cliente reativado com sucesso!');
    }

}
