<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SiteController extends Controller
{
    private $baseUri;

    public function __construct()
    {
        //$aux = 'https://boom-phrygian-sceptre.glitch.me';
        $aux = 'http://localhost:8001';
        $this->baseUri = $aux . '/api/v1';
    }

    

}
