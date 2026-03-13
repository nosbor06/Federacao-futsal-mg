<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ================= CADASTRO =================

    // Mostrar tela de cadastro
    public function showCadastro()
    {
        return view('auth.cadastro');
    }

    // Salvar cadastro
    public function cadastro(Request $request)
    {
        $validated = $request->validate([
            'nome' => ['required','string','max:100'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','min:6'],
            'tipo' => ['required','in:admin,responsavel']
        ]);

        User::create([
            'nome' => $validated['nome'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'tipo' => $validated['tipo']
        ]);

        // 👉 redireciona direto para login
        return redirect()->route('login')
            ->with('success', 'Usuário cadastrado com sucesso! Faça login.');
    }

    // ================= LOGIN =================

    // Mostrar tela de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Fazer login
    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credenciais)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // Redirecionamento por nível
            if ($user->tipo === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            if ($user->tipo === 'responsavel') {
                return redirect()->route('responsavel.dashboard');
            }

            // fallback
            return redirect('/');
        }

        return back()->with('error', 'Email ou senha inválidos.');
    }

    // ================= LOGOUT =================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}