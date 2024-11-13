<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Data;
use App\Models\Movimiento;
use function Termwind\render;

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

    public function login() {
        return view('login');
    }

    public function listado_admin(Request $request) {
        // Obtenemos el valor de la búsqueda
        $query = $request->get('query');

        // Construimos la consulta base
        $data = DB::table('data')
            ->join('fotos', 'data.foto_id', '=', 'fotos.id')
            ->select('data.*', 'fotos.url as foto_url')
            ->where('estado_ident', '=', 'NR');

        // Si hay un query, aplicamos el filtro
        if ($query) {
            $data->where('nombre', 'like', "%{$query}%");
        }

        // Obtenemos los resultados con paginación
        $data = $data->paginate(10);

        // Devolvemos la vista con los datos paginados
        return view('dashboard', compact('data'));
    }

    public function recuperado($dato) {
        // Encuentra el registro por el id ($dato)
        $data = Data::find($dato);

        // Si el registro existe, cambia el valor del campo
        if ($data) {
            $data->estado_ident = 'R'; // Asignar el nuevo valor
            $data->save(); // Guardar los cambios en la base de datos
        }

        // Crear un registro en la tabla movimientos
        Movimiento::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'El usuario ' . Auth::user()->name . ' marcó como recuperado el elemento con ID ' . $dato
        ]);

        // Opcional: devolver una respuesta, redirigir o mostrar un mensaje
        return redirect()->route('listado-admin')->with('success', 'Estado actualizado correctamente');
    }

    public function logout(Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    public function captura(){
        return view('captura');
    }

    public function savecaptura(){
        return view('captura');
    }
}
