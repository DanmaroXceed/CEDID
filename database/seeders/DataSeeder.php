<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Data;
use Illuminate\Support\Facades\Log;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(base_path("catalogos/DBSeeder 2.tsv"), "r");

        $firstline = true;

        while (($data = fgetcsv($csvFile, 2000, "\t")) !== FALSE) {
            if (!$firstline) {
                Data::create([
                    "cni_ci" => $data[0],
                    "estado_ident" => $data[1],
                    "foto_id" => $data[2],
                    "nombre" => $data[3],
                    "clave_elec" => $data[4],
                    "fecha_ingreso" => $data[5],
                    "tatuajes" => $data[6],
                    "señas" => $data[7],
                    "vestimenta" => $data[8],
                    "fecha_nac" => $data[9],
                    "edad" => $data[10],
                    "d_calle" => $data[11],
                    "d_num" => $data[12],
                    "d_col" => $data[13],
                    "d_cp" => $data[14],
                    "d_est" => $data[15],
                    "d_muni" => $data[16],
                    "d_localidad" => $data[17],
                    "cedid" => $data[18],
                ]);   
            }
            $firstline = false;
        }
        fclose($csvFile);
    }
}
