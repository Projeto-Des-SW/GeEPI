<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreColaboradorRequest;
use App\Models\Colaborador;
use App\Models\Setor;
use Illuminate\Support\Facades\Auth;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->tipo_usuario_id == 1) {
            $colaboradores = Colaborador::all()->sortBy('id');
        }
        elseif (Auth::user()->tipo_usuario_id == 2){
            $colaboradores = Colaborador::where('setor_id', Auth::user()->setor->id)->get()->sortBy('id');
        }

        return view('colaborador.index',compact('colaboradores'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setores = Setor::all()->sortBy('id');

        return view('colaborador.create', compact('setores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColaboradorRequest $request)
    {
        $colaborador = new Colaborador();

        $colaborador->nome = $request->nome;
        $colaborador->setor_id = $request->setor_id;

        $colaborador->save();

        return redirect(route('colaborador.index'))->with(['message' => 'Colaborador cadastrado com sucesso!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($colaborador_id)
    {
        $colaborador = Colaborador::findOrFail($colaborador_id);

        $setores = Setor::all()->sortby('id');

        return view('colaborador.edit', compact('colaborador', 'setores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreColaboradorRequest $request)
    {
        $colaborador = Colaborador::findOrFail($request->id);

        $colaborador->nome = $request->nome;
        $colaborador->setor_id = $request->setor_id;

        $colaborador->update();

        return redirect(route('colaborador.index'))->with(['message' => 'Colaborador atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($colaborador_id)
    {
        $colaborador = Colaborador::findOrFail($colaborador_id);

        $colaborador->delete();

        return redirect(route('colaborador.index'))->with(['message' => 'Colaborador excluído com sucesso!']);
    }
}
