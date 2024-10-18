<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        return view('principal');
    }

    public function listado()
    {
        $query = DB::table('data')
            ->select('data.*', 'fotos.url as url')  // Para obtener también la URL de la foto
            ->join('fotos', 'data.foto_id', '=', 'fotos.id')
            ->where('estado_ident','=','NR');

        $data = $query->get();

        session(['data' => $data]);
        
        // dd($data);
        return view('tarjetas', compact('data'));
    }
}
