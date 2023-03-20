<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    private $baseUri;
    private $SbaseUri;

    public function __construct()
    {
        //$aux = 'https://boom-phrygian-sceptre.glitch.me';
        $aux = 'http://localhost:8001';
        $this->baseUri = $aux . '/api/v1/qr/';
        $this->SbaseUri = $aux . '/api/v1/usuario/report/';
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
}
