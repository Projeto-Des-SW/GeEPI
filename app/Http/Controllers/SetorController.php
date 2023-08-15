<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSetorRequest;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setores = Setor::all()->sortBy('id');

        return view('setor.index', compact('setores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSetorRequest $request)
    {
        $setor = new Setor();

        $setor->nome = $request->nome;

        $setor->save();

        return redirect(route('setor.index'))->with(['message' => 'Setor cadastrado com sucesso!']);
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
    public function edit($setor_id)
    {
        $setor = Setor::findOrFail($setor_id);

        return view('setor.edit', compact('setor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSetorRequest $request)
    {
        $setor = Setor::findOrFail($request->id);

        $setor->nome = $request->nome;

        $setor->update();

        return redirect(route('setor.index'))->with(['message' => 'Setor atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($setor_id)
    {
        $setor = Setor::findOrFail($setor_id);

        $setor->delete();

        return redirect(route('setor.index'))->with(['message' => 'Setor excluído com sucesso!']);
    }
}
