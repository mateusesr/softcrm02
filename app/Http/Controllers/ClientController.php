<?php

namespace App\Http\Controllers;

use App\Models\Client;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::with('city')->get();
        // dd($clients);
        return view('client.index', compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $client = Client::create($request->toArray());

        return view("client.create", compact('client'));
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
        $client = Client::whereId($id)->first();
        return view("client.edit", compact('client'));
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
        if ($client) {
            $client = Client::whereId($id)->first();
            $message = 'Cliente Atualizado com Sucesso!';
        } else {
            $client = Client::whereId($id)->first();
            $message = 'Erro ao Atualizar!';
        }
        return view("client.edit", compact('client', 'message'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $deleted = Client::destroy($id);

    if ($deleted) {
 
        return redirect()->route('client.index');
    } else {

        return redirect()->route('client.index');
    }
}

}
