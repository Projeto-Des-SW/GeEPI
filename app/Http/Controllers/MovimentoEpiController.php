<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovimentoEpiRequest;
use App\Models\Epi;
use App\Models\Estoque;
use App\Models\MovimentoEpi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MovimentoEpiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_entrada()
    {
        $epis = Epi::all()->sortBy('id');

        return view('estoque.create_entrada', compact('epis'));
    }


    public function create_saida()
    {
        $epis = Epi::all()->sortBy('id');

        return view('estoque.create_saida', compact('epis'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreMovimentoEpiRequest $request)
    {
        $movimento = new MovimentoEpi();

        $estoque = Estoque::where('epi_id', $request->epi_id)->first();

        if (!$estoque)
        {
            $estoque = new Estoque();

            $estoque->quantidade = 0;
            $estoque->epi_id = $request->epi_id;

            $estoque->save();
        }

        if ($request->tipo == 'entrada')
        {
            $estoque->quantidade += $request->quantidade;

            $movimento->tipo = $request->tipo;
            $movimento->quantidade = $request->quantidade;
            $movimento->descricao = $request->descricao;
            $movimento->epi_id = $request->epi_id;
            $movimento->data_movimento = Carbon::now()->format('Y-m-d');

            $estoque->update();

            $movimento->save();

            return redirect(route('estoque.index'))->with(['message' => 'Entrada registrada com sucesso!']);

        } else
        {
            if ($request->quantidade <= $estoque->quantidade)
            {
                $estoque->quantidade -= $request->quantidade;

                $movimento->tipo = $request->tipo;
                $movimento->quantidade = $request->quantidade;
                $movimento->descricao = $request->descricao;
                $movimento->epi_id = $request->epi_id;
                $movimento->data_movimento = Carbon::now()->format('Y-m-d');

                $estoque->update();

                $movimento->save();

                return redirect(route('estoque.index'))->with(['message' => 'Saída registrada com sucesso!']);
            }
            else
            {
                return redirect()->back()->with(['error_message' => 'A quantidade em estoque é inferior ä saída solicitada!']);
            }
        }
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
