<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    private $baseUri;
    private $maquinas;

    public function __construct()
    {
        $this->baseUri = 'https://boom-phrygian-sceptre.glitch.me/api/v1/usuario';
        $this->maquinas = 'https://boom-phrygian-sceptre.glitch.me/api/v1/maquina/user/';
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function index()
    {
        $response = Http::get($this->baseUri);
        $usuarios = $response->json();
        $usuarios = $this->paginate($usuarios, 10);
        $usuarios->setPath('usuarios');
        return view('usuarios', compact('usuarios'));
    }

    public function maquinas(){
        $id = session()->get('user');
        $api_route = $this->maquinas.$id['id_usuario'];
        $response = Http::get($api_route);
        $maquinas = $response->json();
        $permisos = session()->get('permiso');
        return view('maquinas', compact('maquinas', 'permiso'));
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
                session(['user' => $response['usuario']]);
                session()->put('permiso',$response['permiso']); //Aun no investi-go como funcionan las "Session" en laravel
                return redirect()->route('landing');
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

