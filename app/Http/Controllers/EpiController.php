<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEpiRequest;
use App\Models\Epi;
use App\Models\Estoque;
use http\Message;
use Illuminate\Http\Request;

class EpiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $epis = Epi::all()->sortBy('id');

        return view('epi.index', compact('epis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('epi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEpiRequest $request)
    {
        Epi::create($request->all());

        return redirect(route('epi.index'))->with(['message' => 'EPI cadastrado com sucesso!']);
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
    public function edit($epi_id)
    {
        $epi = Epi::findOrFail($epi_id);

        return view('epi.edit', compact('epi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEpiRequest $request)
    {
        $epi = Epi::findOrFail($request->epi_id);

        $epi->nome = $request->nome;
        $epi->quantidade_minima = $request->quantidade_minima;
        $epi->certificado_aprovacao = $request->certificado_aprovacao;

        $epi->update();

        return redirect(route('epi.index'))->with(['message' => 'EPI atualizado com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($epi_id)
    {
        $epi = Epi::findOrFail($epi_id);
        $estoque = Estoque::where('epi_id', $epi_id)->first();

        $estoque->delete();
        $epi->delete();

        return redirect(route('epi.index'))->with(['message' => 'EPI excluído com sucesso!']);
    }
}
