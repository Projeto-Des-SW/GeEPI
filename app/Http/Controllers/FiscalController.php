<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFiscalRequest;
use App\Models\Fiscal;
use App\Models\Setor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FiscalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::where('tipo_usuario_id', '2')->get()->sortBy('id');
        return view('usuario.fiscal_index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $setores = Setor::all()->sortBy('id');

        return view('usuario.fiscal_create',compact('setores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFiscalRequest $request)
    {
        $fiscal = new User();

        $fiscal->nome = $request->nome;
        $fiscal->email = $request->email;
        $fiscal->cpf = $request->cpf;
        $fiscal->contato = $request->contato;
        $fiscal->password = Hash::make($request->password);
        $fiscal->tipo_usuario_id = $request->tipo_usuario_id;
        $fiscal->setor_id = $request->setor_id;

        $fiscal->save();

        return redirect(route('fiscal.create'))->with(['message' => 'Fiscal cadastrado com sucesso!']);
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
