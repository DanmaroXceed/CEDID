<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function listado(Request $request)
    {
        $query = DB::table('data')
            ->select('data.*', 'fotos.url as url')  // Para obtener también la URL de la foto
            ->join('fotos', 'data.foto_id', '=', 'fotos.id');
        
        // Si hay un término de búsqueda, filtramos los resultados
        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where('data.nombre', 'like', '%' . $search . '%');
                // ->orWhere('data.cni_ci', 'like', '%' . $search . '%');
        }

        $data = $query->get();
        
        // dd($data);
        return view('tarjetas', compact('data'));
    }
}
