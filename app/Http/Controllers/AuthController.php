<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // Mostrar tela de cadastro
    public function showCadastro()
    {
        return view('auth.cadastro');
    }

    // Salvar cadastro no banco
    public function cadastro(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Usuário cadastrado com sucesso!');
    }


    // Mostrar tela de login
    public function showLogin()
    {
        return view('auth.login');
    }


    // Fazer login
   public function login(Request $request)
    {
        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credenciais)) {
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email ou senha inválidos');
    }


    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

}