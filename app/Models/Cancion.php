<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory as FactoriesHasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    use FactoriesHasFactory;

    protected $table = "canciones";
}
