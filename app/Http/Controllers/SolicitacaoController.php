<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Colaborador;
use App\Models\Epi;
use App\Models\ItemSolicitacao;
use App\Models\Solicitacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
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
        $colaboradores = Colaborador::where('setor_id', Auth::user()->setor_id)->get()->sortBy('id');

        $epis = Epi::all()->sortBy('id');

        return view('solicitacao.create', compact('colaboradores', 'epis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $solicitacao = Solicitacao::create([
            'status' => 'Em Análise',
            'observacao_fiscal' => $request->observacao_fiscal,
            'user_id' => Auth::user()->id
        ]);

        for($count = 0; $count < sizeof($request->colaborador_id); $count++)
        {
            $item_solicitacao = new ItemSolicitacao();

            $item_solicitacao->quantidade_solicitada = $request->quantidade[$count];
            $item_solicitacao->solicitacao_id = $solicitacao->id;
            $item_solicitacao->user_id = Auth::user()->id;
            $item_solicitacao->epi_id = $request->epi_id[$count];
            $item_solicitacao->colaborador_id = $request->colaborador_id[$count];

            $item_solicitacao->save();
        }

        return redirect(route('home'))->with(['message' => 'Solicitação realizada com sucesso!']);
    }

    public function analisar()
    {
        $solicitacoes = Solicitacao::where('status','Em Análise')->get()->sortBy('id');
        return view('solicitacao.analisar', compact('solicitacoes'));
    }

    public function epis_solicitacao($solicitacao)
    {
        $epis_solicitacao = ItemSolicitacao::where('solicitacao_id', $solicitacao)
            ->join('epis', 'epis.id', '=', 'item_solicitacaos.epi_id')
            ->join('colaboradors', 'colaboradors.id', '=', 'item_solicitacaos.colaborador_id')
            ->select('epis.nome AS nome_epi', 'colaboradors.nome AS nome_colaborador', 'item_solicitacaos.*')->get();

        return response()->json($epis_solicitacao);
    }


    public function finalizar_solicitacao()
    {
        return back()->with(['message' => 'Solicitação finalizada com sucesso']);
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
