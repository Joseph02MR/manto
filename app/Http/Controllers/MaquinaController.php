<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class MaquinaController extends Controller
{
    private $baseApiUri;

    public function __construct()
    {
        //$aux = 'https://boom-phrygian-sceptre.glitch.me';
        $aux = 'http://localhost:8001';
        $this->baseApiUri = $aux . '/api/v1';
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
                $api_route = $this->baseApiUri . '/maquina' . '/' . $request->query('id');
                $response = Http::get($api_route);
                //print_r($response);
                //die();
                $maquina = $response->json()['0'];
            } else {
                $maquina = null;
            }
            return view('AdDevice', compact('deptos', 'maquina'));
        }
        return redirect()->route('redirect_login');
    }

    public function store(Request $request)
    {
        $response = Http::post($this->baseApiUri . '/maquina', $request->all());

        return redirect()->route('maquinas.admin');
    }

    public function update(Request $request)
    {
        $response = Http::put("{$this->baseApiUri}/maquina/{$request->get('id')}", $request->all());

        return redirect()->route('maquinas.admin');
    }

    public function destroy(Request $request)
    {
        //die("{$this->baseApiUri}/maquina/{$request->get('id')}");
        $response = Http::delete("{$this->baseApiUri}/maquina/{$request->get('id')}");

        return redirect()->route('maquinas.admin');
    }
}
