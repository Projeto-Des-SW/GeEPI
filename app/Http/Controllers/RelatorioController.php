<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MovimentoEpi;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RelatorioController extends Controller
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
    public function create()
    {
        return view('relatorio.escolha');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function gerar(Request $request)
    {
        $request->data_inicio = Carbon::parse($request->data_inicio)->format('d/m/Y');
        $request->data_fim = Carbon::parse($request->data_fim)->format('d/m/Y');

        if ($request->tipo_relatorio == 'entrada')
        {
            $movimento_epis = MovimentoEpi::where('tipo', 'entrada')->where('data_movimento', '>=', $request->data_inicio)->
            where('data_movimento', '<=', $request->data_fim)->get();
        }
        elseif($request->tipo_relatorio == 'saida')
        {
            $movimento_epis = MovimentoEpi::where('tipo', 'saida')->where('data_movimento', '>=', $request->data_inicio)->
            where('data_movimento', '<=', $request->data_fim)->get();
        }

        foreach($movimento_epis as $movimento)
        {
            $movimento->data_movimento = Carbon::parse($movimento->data_movimento)->format('d/m/Y');
        }

        $pdf = Pdf::loadView('relatorio.' . $request->tipo_relatorio, compact('movimento_epis', 'request'));

        $nomePDF = 'relatorio_' . $request->tipo_relatorio . '.pdf';

        $pdf->set_option("dpi", 150);
        $pdf->setPaper('a4');

        return $pdf->stream($nomePDF);
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
