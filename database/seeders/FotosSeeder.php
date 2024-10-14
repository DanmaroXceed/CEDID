<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Foto;

class FotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ruta de la carpeta donde están las imágenes
        $ruta = public_path('fotos');
        
        // Obtener todas las imágenes de la carpeta
        $archivos = scandir($ruta);

        $archivos = array_diff($archivos, ['.', '..']); // Remover '.' y '..'
        natsort($archivos); // Ordenar en orden natural
        
        foreach ($archivos as $archivo) {            
            // Generar la URL
            $url = asset('fotos/' . $archivo);
            
            // Guardar en la base de datos
            Foto::create(['url' => $url]);
        }
    }
}
