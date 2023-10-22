<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = "personas";
    // protected $primaryKey = "DNI";
    // public $incrementing = false;
    protected $fillable = [
        'DNI',
        'Nombre',
        'Tfno',
        'edad'
    ];
}
