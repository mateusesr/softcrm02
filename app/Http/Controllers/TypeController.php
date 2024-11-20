<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    
    public function index()
    {
        $types = Type::all();
        return view('type.index', compact('types'));
    }

    
    public function create()
    {
        return view('type.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Type::create($request->all());

        return redirect()->route('type.index')->with('success', 'Tipo criado com sucesso.');
    }

   
    public function show(Type $type)
    {
        return view('type.show', compact('type'));
    }

    
    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    
    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $type->update($request->all());

        return redirect()->route('type.index')->with('success', 'Tipo atualizado com sucesso.');
    }

    
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('type.index')->with('success', 'Tipo excluído com sucesso.');
    }
}
