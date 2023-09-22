<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\SolicitacaoFinalizada;
use App\Mail\SolicitacaoRealizada;
use App\Models\Colaborador;
use App\Models\Epi;
use App\Models\Estoque;
use App\Models\ItemSolicitacao;
use App\Models\Solicitacao;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('solicitacao.index');
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
        $adm = User::where('tipo_usuario_id', 1)->first();

        $solicitacao = Solicitacao::create([
            'status' => 'Em análise',
            'observacao_fiscal' => $request->observacao_fiscal,
            'user_id' => Auth::user()->id,
            'data_criado' => Carbon::now()->format('Y-m-d')
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

        Mail::to($adm->email)->send(new SolicitacaoRealizada([
            'adm' => $adm,
            'fiscal' => Auth::user(),
            'solicitacao' => $solicitacao
        ]));

        return redirect(route('home'))->with(['message' => 'Solicitação realizada com sucesso!']);
    }

    public function analisar()
    {
        $solicitacoes = Solicitacao::where('status','Em análise')->get()->sortBy('id');
        foreach ($solicitacoes as $solicitacao){

            $solicitacao->data_criado = (Carbon::parse($solicitacao->data_criado)->format('d/m/Y'));

        }
        return view('solicitacao.analisar', compact('solicitacoes'));
    }

    public function finalizada()
    {
        $solicitacoes = Solicitacao::whereIn('status',['Aprovada', 'Rejeitada'])->get()->sortBy('id');
        foreach ($solicitacoes as $solicitacao){

            $solicitacao->data_criado = (Carbon::parse($solicitacao->data_criado)->format('d/m/Y'));

        }
        return view('solicitacao.finalizada', compact('solicitacoes'));
    }

    public function consultar()
    {
        $solicitacoes = Solicitacao::where('user_id',Auth::user()->id)->orderBy('created_at', 'desc')->get();


        foreach ($solicitacoes as $solicitacao){

            $solicitacao->data_criado = (Carbon::parse($solicitacao->data_criado)->format('d/m/Y'));

        }
        return view( 'solicitacao.consultar', compact( 'solicitacoes'));

    }

    public function epis_solicitacao($solicitacao)
    {
        $epis_solicitacao = ItemSolicitacao::where('solicitacao_id', $solicitacao)
            ->join('epis', 'epis.id', '=', 'item_solicitacaos.epi_id')
            ->join('colaboradors', 'colaboradors.id', '=', 'item_solicitacaos.colaborador_id')
            ->select('epis.nome AS nome_epi', 'colaboradors.nome AS nome_colaborador', 'item_solicitacaos.*')->get();

        return response()->json($epis_solicitacao);
    }


    public function finalizar_solicitacao(Request $request)
    {
        $solicitacao = Solicitacao::findOrFail($request->id);
        $itens_solicitacao = ItemSolicitacao::where('solicitacao_id', $solicitacao->id)->get();

        $fiscal = User::findOrFail($solicitacao->user_id);

        $quantidade_itens = [];

        if($request->action == "Aprovada")
        {
            foreach($itens_solicitacao as $item_solicitacao)
            {
                $item_id = $item_solicitacao->epi->id;
                $quantidade_solicitada = $item_solicitacao->quantidade_solicitada;

                if (!isset($quantidade_itens[$item_id]))
                {
                    $quantidade_itens[$item_id] = 0;
                }

                $quantidade_itens[$item_id] += $quantidade_solicitada;

                if ($quantidade_itens[$item_id] > $item_solicitacao->epi->estoque->quantidade)
                {
                    return back()->with(['error_message' => 'Impossível aprovar! A quantidade de ' . $item_solicitacao->epi->nome .
                        ' solicitados(as) é superior à quantidade em estoque!']);
                }
            }

            foreach($itens_solicitacao as $item_solicitacao)
            {
                $estoque = Estoque::findOrFail($item_solicitacao->epi->estoque->id);

                $estoque->quantidade -= $item_solicitacao->quantidade_solicitada;

                $estoque->update();
            }
        }


        $solicitacao->observacao_administrador = $request->observacao_administrador;
        $solicitacao->status = $request->action;

        $solicitacao->update();


        Mail::to($fiscal->email)->send(new SolicitacaoFinalizada([
            'fiscal' => $fiscal,
            'solicitacao' => $solicitacao
        ]));


        return back()->with(['message' => 'Solicitação finalzada!']);
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
