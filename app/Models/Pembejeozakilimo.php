<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembejeozakilimo extends Model
{
    use HasFactory;
    protected $fillable = ['pembejeo_jina', 'pembejeo_maelezo', 'pembejeo_bei', 'pembejeo_picha'];
}
