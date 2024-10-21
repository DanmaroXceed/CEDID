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
            ->select('data.cedid')  // Para obtener también la URL de la foto
            ->where('estado_ident','=','NR');

        $data = $query->get();
        
        return view('cedulas', compact('data'));
    }

    public function cedulas(){
        $query = DB::table('data')
            ->select('*')  // Para obtener también la URL de la foto
            ->where('estado_ident','=','NR');
        $data = $query->get();
        
        return view('cedulas', compact('data'));
    }
}
