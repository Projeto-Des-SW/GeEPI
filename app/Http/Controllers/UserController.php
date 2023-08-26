<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSenhaRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function edit()
    {
        $usuario = User::findOrFail(Auth::user()->id);

        return view('usuario.editar_perfil', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $request)
    {
        $usuario = User::findOrFail(Auth::user()->id);

        if($usuario->tipo_usuario_id == 1)
        {
            $usuario->nome = $request->nome;
            $usuario->email = $request->email;
            $usuario->contato = $request->contato;

            $usuario->update();

            return redirect(route('home'))->with(['message' => 'Perfil atualizado com sucesso!']);
        }
        else
        {
            $usuario->nome = $request->nome;
            $usuario->cpf = $request->cpf;
            $usuario->email = $request->email;
            $usuario->contato = $request->contato;

            $usuario->update();

            return redirect(route('home'))->with(['message' => 'Perfil atualizado com sucesso!']);
        }
    }

    public function alterar_senha()
    {
        $usuario = User::findOrFail(Auth::user()->id);

        return view('usuario.alterar_senha', compact('usuario'));
    }


    public function senha_update(UpdateSenhaRequest $request)
    {
        $usuario = Auth::user();

        if (!Hash::check($request->current_password, $usuario->password)) {
            return redirect()->back()->withErrors(['current_password' => 'A senha atual está incorreta.']);
        }

        $usuario->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('home'))->with(['message' => 'Senha atualizada com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
