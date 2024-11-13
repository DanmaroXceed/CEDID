<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'cni_ci',
        'estado_ident',
        'foto_id',
        'nombre',
        'clave_elec',
        'fecha_ingreso',
        'tatuajes',
        'señas',
        'vestimenta',
        'fecha_nac',
        'edad',
        'd_calle',
        'd_num',
        'd_col',
        'd_cp',
        'd_est',
        'd_muni',
        'd_localidad',
        'cedid',
    ];
}
