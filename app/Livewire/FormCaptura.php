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
    public $fecha_ingreso = '';
    public $fecha_nac = '';
    public $d_calle = '';
    public $d_num = '';
    public $d_col = '';
    public $d_cp = '';
    public $d_est = '';
    public $d_muni = '';
    public $d_localidad = '';
    
    // public $foto;
    public $cedid = '';

    public $edad = '';
    public $foto_id = '';
    public $foto;
    
    public function guardar(){
        $this->validate(); 

        # Generar cedula con datos
        $this->cedid = $this->generarCEDID();

        # Guardar foto
        if (!empty($this->foto)) {
            $this->foto_id = $this->guardarfoto($this->foto);
        }else{
            $this->foto_id = null;
        }

        # Guardar registro - añadir nombre de cedula
        Data::create([
            'cni_ci' => $this->cni_ci,
            'estado_ident' => $this->estado_ident,
            'nombre' => $this->nombre,
            'clave_elec' => $this->clave_elec,
            'fecha_ingreso' => $this->fecha_ingreso,
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

    public function guardarfoto($archivo)
    {
        try {
            // Verificar si el archivo ha sido cargado correctamente
            if (!$archivo || !$archivo->isValid()) {
                return session()->flash('error','El archivo no es válido o no se ha cargado correctamente.');
            }

            // Obtener la extensión del archivo original
            $extension = $archivo->getClientOriginalExtension();

            // Validar la extensión del archivo (por ejemplo, solo imágenes)
            $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array(strtolower($extension), $extensionesPermitidas)) {
                return session()->flash('error','La extensión del archivo no es válida. Se permiten solo imágenes JPG, JPEG, PNG o GIF.');
            }

            // Generar un nombre aleatorio para el archivo
            $nombreArchivo = Str::random(10) . '.' . $extension;

            // Intentar guardar el archivo en el directorio 'public/fotos'
            $path = $archivo->storeAs('fotos', $nombreArchivo, 'public');
            if (!$path) {
                return session()->flash('error','Hubo un problema al guardar el archivo.');
            }

            // Crear un nuevo registro en la tabla de fotos y obtener el objeto creado
            $foto = Foto::create(['url' => $nombreArchivo]);
            if (!$foto) {
                return session()->flash('error','Hubo un problema al guardar los datos en la base de datos.');
            }

            // Devolver el id del registro creado
            return $foto->id;
        } catch (\Exception $e) {
            // Manejo de excepciones: devolver el mensaje de error
            return session()->flash('error', $e->getMessage());
        }
    }

    public function generarCEDID(){

    }

    public function rules()
    {
        return [
            'cni_ci' => 'required|max:50',
            'nombre' => 'required|max:100',
            'clave_elec' => 'max:25',
            'tatuajes' => 'max:750',
            'señas' => 'max:750',
            'vestimenta' => 'max:750',
            'fecha_nac' => 'required',
            'fecha_ingreso' => 'required',
            'd_calle' => 'required|max:50',
            'd_num' => 'required|max:15',
            'd_col' => 'required|max:50',
            'd_cp' => 'required|max:5',
            'd_est' => 'required|max:50',
            'd_muni' => 'required|max:50',
            'd_localidad' => 'required|max:50',

            // 'foto' => 'required|image|max:10240|mimes:jpeg,png,jpg,gif,svg'
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
