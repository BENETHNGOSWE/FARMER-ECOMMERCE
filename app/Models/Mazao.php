<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mazao extends Model
{
    use HasFactory;
    protected $fillable = ['mazao_jina', 'mazao_maelezo', 'mazao_bei', 'mazao_picha', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
