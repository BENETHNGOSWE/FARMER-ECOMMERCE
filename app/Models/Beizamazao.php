<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beizamazao extends Model
{
    use HasFactory;
    protected $fillable = ['makundiyamazao_id', 'name', 'min_price', 'max_price'];

    public function makundiyamazao(){
        return $this->belongsTo(Makundiyamazao::class);
    }
}
