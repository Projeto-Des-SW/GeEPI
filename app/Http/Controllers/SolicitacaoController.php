<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Colaborador;
use App\Models\Epi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        for($count = 0; $count < sizeof($request->colaborador); $count++)
        {
            dd($request->colaborador[$count+1], $request->epi[$count+1], $request->quantidade[$count+1]);
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
