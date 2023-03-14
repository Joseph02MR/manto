<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    private $baseUri;

    public function __construct()
    {
        $this->baseUri = 'https://sustaining-lemon-treatment.glitch.me/api/v1/usuario';
    }

    public function index()
    {
        $response = Http::get($this->baseUri);
        $usuarios = $response->json();
        $usuarios = new Paginator($usuarios, 10);
        return view('usuarios', compact('usuarios'));
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $response = Http::post($this->baseUri.'/login', [
                'correo' => $request->input('correo'),
                'contrasena' => $request->input('contrasena'),
            ]);
    
            if ($response->status() === 200) {
                // Si se autenticó correctamente, guardar información en la sesión y redirigir
                //session(['user' => $response['usuario']]); //Aun no investigo como funcionan las "Session" en laravel
                return redirect()->route('template');
            } else {
                // Si no se autenticó correctamente, mostrar mensaje de error
                return back()->with('error', 'Credenciales inválidas');
            }
        }
        return view('usuarios_login');
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $response = Http::post($this->baseUri, $request->all());

        return redirect()->route('usuarios.index');
    }

    public function edit($id)
    {
        $response = Http::get("{$this->baseUri}/{$id}");
        $usuario = $response->json();

        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("{$this->baseUri}/{$id}", $request->all());

        return redirect()->route('usuarios.index');
    }

    public function destroy($id)
    {
        $response = Http::delete("{$this->baseUri}/{$id}");

        return redirect()->route('usuarios.index');
    }
}

