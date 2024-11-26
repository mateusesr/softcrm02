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
        $type = Type::create($request->toArray());

        return view("type.create", compact('type')); // Passando as cidades para a view
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
        try {
            // Validate the value...
            $result = $type->deleteOrFail();
            print($result);
            return redirect()->route('type.index')->with('message', 'Tipo de Atendimento excluída com sucesso.');

            //return redirect()->route('type.index')->with('error', 'Não foi possível excluir o Tipo de Atendimento.');   

        } catch (\Exception $e) {
            $result = false;
            return redirect()->route('type.index')->with('message', 'Não foi possível excluir o Tipo de Atendimento.');
        } catch (\Exception $e) {
            $result = false;
            return redirect()->route('type.index')->with('message', 'Não foi possível excluir o Tipo de Atendimento.');
            //do something when exception is thrown
        } catch (\Error $e) {
            $result = false;
            return redirect()->route('type.index')->with('message', 'Não foi possível excluir o Tipo de Atendimento.');
            //do something when error is thrown
        } catch (\Throwable $e) {
            $result = false;
            return redirect()->route('type.index')->with('message', 'Não foi possível excluir o Tipo de Atendimento.');
            //do something when Throwable is thrown
        }
    }
}
