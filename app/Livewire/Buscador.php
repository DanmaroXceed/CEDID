<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\DB;

class Buscador extends Component
{
    public $nombre = '';

    public $estado = '';

    public $municipio = '';

    public $sexo = '';

    public function buscar(){
        // $this->validate(); 

        // Validar que al menos un campo esté lleno
        if (empty($this->nombre) && empty($this->estado) && empty($this->municipio) ) {
            // Devolver un error si no hay datos en ninguno de los campos
            session()->flash('error', 'Debes completar al menos un campo para buscar.');
            return;
        }

        // Crear la consulta de búsqueda
        $query = DB::table('data')
            ->select('data.*', 'fotos.url as url')  // Para obtener también la URL de la foto
            ->join('fotos', 'data.foto_id', '=', 'fotos.id');

        // Agregar condiciones solo si los campos tienen valores
        if (!empty($this->nombre)) {
            $query->where('data.nombre', 'like', '%' . $this->nombre . '%');
        }

        if (!empty($this->estado)) {
            $query->where('data.d_est', 'like', '%' . $this->estado . '%');
        }

        if (!empty($this->municipio)) {
            $query->where('data.d_muni', 'like', '%' . $this->municipio . '%');
        }

        // Validar el campo sexo solo si no está vacío
        if (!empty($this->sexo)) {
            // Buscamos en la clave de elector, verificando la décima posición
            $query->whereRaw("SUBSTRING(data.clave_elec, 15, 1) = ?", [$this->sexo]);
        }

        $query->where('estado_ident','=','NR');

        $data = $query->get();
        
        // Guarda los datos en la sesión
        session(['data' => $data]);
        
        // dd($data);
        return redirect()->route('filtrado')->with('data', $data);
    }

    public function limpiar()
    {
        $this->reset(['nombre', 'estado', 'municipio', 'sexo']);
    }

    public function render()
    {
        return view('livewire.buscador');
    }
}
