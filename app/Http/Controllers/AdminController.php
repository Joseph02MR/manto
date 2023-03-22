<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class AdminController extends Controller
{
    private $baseUri;
    private $SbaseUri;
    private $baseApiUri;

    public function __construct()
    {
        //$aux = 'https://boom-phrygian-sceptre.glitch.me';
        $aux = 'http://localhost:8001';
        $this->baseUri = $aux . '/api/v1/qr/';
        $this->SbaseUri = 'https://boom-phrygian-sceptre.glitch.me/api/v1/usuario/report/';
        $this->baseApiUri = $aux . '/api/v1';
    }

    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function getqr($id)
    {
        $response = Http::post($this->baseUri, [
            'link' => $this->SbaseUri . $id,
        ]);

        if ($response->successful()) {
            $qr = $response->body();
            return view('qrcode', compact('qr'));
        } else {
            $errorMessage = $response->body();
            return view('errorPage', compact('errorMessage'));
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
}
