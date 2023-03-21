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
    private $baseApiUri;

    public function __construct()
    {
        //$aux = 'https://boom-phrygian-sceptre.glitch.me';
        $aux = 'http://localhost:8001';
        $this->baseUri = $aux . '/api/v1/usuario';
        $this->baseApiUri = $aux . '/api/v1';
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function index()
    {
        //se valida que haya un usuario en sesión, falta validar permisos

        $id = session()->get('user');
        if (isset($id)) {
            $response = Http::get($this->baseUri);
            $usuarios = $response->json();
            $usuarios = $this->paginate($usuarios, 10);
            $usuarios->setPath('usuarios');
            return view('usuarios', compact('usuarios'));
        }
        return redirect()->route('redirect_login');
    }

    public function editar_usuario(Request $request)
    {
        $id = session()->get('user');
        if (isset($id)) {
            $api_route = $this->baseApiUri . '/departamento';
            $response = Http::get($api_route);
            $deptos = $response->json();

            if ($request->routeIs('usuarios.editview')) {
                $api_route = $this->baseApiUri . '/usuario' . '/' . $request->query('id');
                $response = Http::get($api_route);
                $usuario = $response->json()['0'];
            } else {
                $usuario = null;
            }
            return view('editarusuario', compact('deptos', 'usuario'));
        }
        return redirect()->route('redirect_login');
    }

    public function maquinas()
    {
        $id = session()->get('user');
        if (isset($id)) {
            $api_route = $this->baseApiUri . '/maquina/user/' . $id['id_usuario'];
            $response = Http::get($api_route);
            $maquinas = $response->json();
            return view('maquinas', compact('maquinas'));
        }
        return redirect()->route('redirect_login');
    }

    public function maquinas_admin()
    {
        $id = session()->get('user');
        if (isset($id)) {
            $api_route = $this->baseApiUri . '/maquina';
            $response = Http::get($api_route);
            $maquinas = $response->json();
            $maquinas = $this->paginate($maquinas, 20);
            $maquinas->setPath('maquinas');
            return view('maquinas_admin', compact('maquinas'));
        }
        return redirect()->route('redirect_login');
    }

    public function editar_maquina(Request $request)
    {
        $id = session()->get('user');
        if (isset($id)) {
            $api_route = $this->baseApiUri . '/departamento';
            $response = Http::get($api_route);
            $deptos = $response->json();

            if ($request->routeIs('maquinas.editview')) {
                $api_route = $this->baseApiUri . '/maquina'. '/' . $request->query('id');
                $response = Http::get($api_route);
                $maquina = $response->json()['0'];
            } else {
                $maquina = null;
            }
            return view('AdDevice', compact('deptos', 'maquina'));
        }
        return redirect()->route('redirect_login');
    }

    public function mantos()
    {
        $id = session()->get('user');
        if (isset($id)) {
            $api_route = $this->baseApiUri . '/manto_view';
            $response = Http::get($api_route);
            $mantos = $response->json();
            return view('mantenimientos', compact('mantos'));
        }
        return redirect()->route('redirect_login');
    }

    public function update_manto_status(Request $request)
    {
        $api_route = $this->baseApiUri . '/manto_status';
        $response = Http::patch($api_route, [
            'id' => $request->input('id'),
            'maquina' => $request->input('maquina')
        ]);
        if ($response->status() === 200) {
            return back()->with('success', 'Actualización realizada');
        } else {
            return back()->with('error', 'Actualización fallida');
        }
    }

    public function bitacora()
    {
        $id = session()->get('user');
        if (isset($id)) {
            $api_route = $this->baseApiUri . '/bitacora';
            $response = Http::get($api_route);
            $registros = $response->json();
            return view('bitacora', compact('registros'));
        }
        return redirect()->route('redirect_login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $response = Http::post($this->baseUri . '/login', [
                'correo' => $request->input('correo'),
                'contrasena' => $request->input('contrasena'),
            ]);

            if ($response->status() === 200) {
                // Si se autenticó correctamente, guardar información en la sesión y redirigir
                session(['user' => $response['usuario']]);
                session()->put('permisos', $response['permiso']); //Aun no investi-go como funcionan las "Session" en laravel
                return redirect()->route('landing');
            } else {
                // Si no se autenticó correctamente, mostrar mensaje de error
                return back()->with('error', 'Credenciales inválidas');
            }
        }
        return view('usuarios_login');
    }

    public function logout()
    {
        session()->forget('user');
        session()->forget('permisos');
        return redirect()->route('redirect_login');
    }

    public function store(Request $request)
    {
        $response = Http::post($this->baseUri, $request->all());

        return redirect()->route('usuarios');
    }

    public function update(Request $request)
    {
        $response = Http::put("{$this->baseUri}/{$request->get('id')}", $request->all());

        return redirect()->route('usuarios');
    }

    public function destroy(Request $request)
    {
        $response = Http::delete("{$this->baseUri}/{$request->get('id')}");

        return redirect()->route('usuarios');
    }
}
