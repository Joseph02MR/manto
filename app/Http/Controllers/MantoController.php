<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;


class MantoController extends Controller
{
    private $baseUri;
    private $mantoUri;
    private $apiUri;

    public function __construct()
    {
        $this->baseUri = 'https://boom-phrygian-sceptre.glitch.me/api/v1/maquina';
        $this->mantoUri = 'https://boom-phrygian-sceptre.glitch.me/api/v1/manto';
        $this->apiUri = 'https://boom-phrygian-sceptre.glitch.me/api/v1';
    }

    public function levantarOrden($id){
        $response = Http::get($this->baseUri.'/'.$id);
        $maquina = $response->json();
        return view('orden_maquina', ['maquina' => $maquina]);
    }
    
    public function sendOrden(Request $req){
        $id_usuario = $req->input('id_usuario');
        $desc = $req->input('descripcion');
        $id_tipo = $req->input('id_tipo');
        $id_maquina = $req->input('id_maquina');
        $piezas = $req->input('piezas');
        $materiales = $req->input('materiales');
        $fecha = $req->input('fecha_mant');
        $id_resp = 2; //NECESITO QUE ESTE ID SE OBTENGA DE LA SESION
        $correo= $req->input('email');
        $nombre= $req->input('nombre');

        $response = Http::post($this->mantoUri.'/orden', [
            'descripcion' => $desc,
            'id_tipo' => $id_tipo,
            'id_maquina' => $id_maquina,
            'piezas' => $piezas,
            'materiales' => $materiales,
            'fecha_mant' => $fecha,
            'id_responsable' => $id_resp,
            'id_usuario' => $id_usuario,
        ]);
        if($response->status()==200){
           $mensaje = "Estimado(a) " . $nombre . ", \n\n" .
           "Le informamos que se ha recibido su solicitud de orden de mantenimiento #". $response['id_mantenimiento'] . ", la cual será atendida a la brevedad posible. A continuación se muestra un resumen de los detalles de la orden de mantenimiento:\n\n" .
           "Descripción: " . $desc . "\n" .
           "Tipo: " . $id_tipo . "\n" .
           "Máquina: " . $id_maquina . "\n" .
           "Piezas: " . $piezas . "\n" .
           "Materiales: " . $materiales . "\n" .
           "Fecha de solicitud: " . $fecha . "\n\n" .
           "Le recordamos que, si tiene alguna duda o necesita hacer alguna modificación a la orden de mantenimiento, puede comunicarse con nosotros a través del correo electrónico " . 'notificaciones.manto@gmail.com' . ".\n\n" .
           "Agradecemos su colaboración y confianza.\n\n" .
           "Atentamente,\n" .
           "El equipo de mantenimiento";
            //Aqui va la logica para mandar un correo xd
            $response2 = Http::post($this->apiUri.'/email', [
                'nombre' => $nombre,
                'correo' => $correo,
                'asunto' => 'Orden de mantenimiento #'.$response['id_mantenimiento'],
                'mensaje' => $mensaje,
            ]);
            if($response->status()==200){
                session()->flash('success', 'El correo electrónico se envió correctamente');
            }
        }
        return redirect('/orden_manto');
    }
    
}
