<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coches extends Model
{
    use HasFactory;

    protected $table = "coches";
    protected $primaryKey = "Matricula";
    public $incrementing = false;
}
