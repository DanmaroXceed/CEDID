<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Data;
use App\Models\Foto;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FormCaptura extends Component
{
    use WithFileUploads;

    public $cni_ci = '';
    public $nombre = '';
    public $estado_ident = 'NR';
    public $clave_elec = '';
    public $tatuajes = '';
    public $señas = '';
    public $vestimenta = '';
    public $fecha_nac = '';
    public $d_calle = '';
    public $d_num = '';
    public $d_col = '';
    public $d_cp = '';
    public $d_est = '';
    public $d_muni = '';
    public $d_localidad = '';
    
    public $foto;
    public $cedid = '';

    public $fecha_ingreso = '';
    public $edad = '';
    public $foto_id = '';
    
    public function guardar(){
        $this->validate(); 

        # Generar cedula con datos
        // $this->cedid = $this->generarCEDID($this);

        # Guardar foto
        $this->foto_id = $this->guardarfoto($this->foto);

        # Guardar registro - añadir nombre de cedula e id de foto
        $data = Data::create([
            'cni_ci' => $this->cni_ci,
            'estado_ident' => $this->estado_ident,
            'nombre' => $this->nombre,
            'clave_elec' => $this->clave_elec,
            'fecha_ingreso' => Carbon::today()->toDateString(),
            'tatuajes' => $this->tatuajes,
            'señas' => $this->señas,
            'vestimenta' => $this->vestimenta,
            'fecha_nac' => $this->fecha_nac,
            'edad' => Carbon::parse($this->fecha_nac)->age, 
            'd_calle' => $this->d_calle,
            'd_num' => $this->d_num,
            'd_col' => $this->d_col,
            'd_cp' => $this->d_cp,
            'd_est' => $this->d_est,
            'd_muni' => $this->d_muni,
            'd_localidad' => $this->d_localidad,
            'cedid' => $this->cedid,
            'foto_id' => $this->foto_id,
        ]);

        return redirect('/captura')->with('Ok', 'Registro guardado exitosamente');
    }

    public function guardarfoto($archivo){
        // Obtener la extensión del archivo original
        $extension = $archivo->getClientOriginalExtension();

        // Generar un nombre aleatorio para el archivo
        $nombreArchivo = Str::random(10) . '.' . $extension;

        // Guardar el archivo en public/fotos
        $archivo->storeAs('fotos', $nombreArchivo, 'public');

        // Crear un nuevo registro en la tabla de fotos y obtener el objeto creado
        $foto = Foto::create(['url' => $nombreArchivo]);

        // Devolver el id del registro creado
        return $foto->id;
    }

    public function generarCEDID(){

    }

    public function rules()
    {
        return [
            'cni_ci' => 'required|max:50',
            'nombre' => 'required|max:100',
            'clave_elec' => 'required|max:25',
            'tatuajes' => 'required|max:750',
            'señas' => 'required|max:750',
            'vestimenta' => 'required|max:750',
            'fecha_nac' => 'required',
            'd_calle' => 'required|max:50',
            'd_num' => 'required|max:15',
            'd_col' => 'required|max:50',
            'd_cp' => 'required|max:5',
            'd_est' => 'required|max:50',
            'd_muni' => 'required|max:50',
            'd_localidad' => 'required|max:50',

            'foto' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function messages() 
    {
        return [
            'required' => 'El campo :attribute es obligatorio.',
            'max' => 'El campo :attribute debe ser menor a :max.',
            'min' => 'El campo :attribute debe ser mayor a :min.',
        ];
    }

    public function validationAttributes() 
    {
        return [
            'cni_ci' => 'Cedula de identificación',
            'nombre' => 'Nombre',
            'clave_elec' => 'Clave de elector',
            'fecha_ingreso' => 'Fecha de ingreso',
            'fecha_nac' => 'Fecha de nacimiento',
            'tatuajes' => 'Tatuajes',
            'señas' => 'Señas particulares',
            'vestimenta' => 'Vestimenta',
            'd_calle' => 'Calle',
            'd_num' => 'Numero de vivienda',
            'd_col' => 'Colonia',
            'd_cp' => 'Código postal',
            'd_est' => 'Estado de procedencia',
            'd_muni' => 'Municipio de procedencia',
            'd_localidad' => 'Localidad de procedencia',
        ];
    }

    public function render()
    {
        return view('livewire.form-captura');
    }
}
