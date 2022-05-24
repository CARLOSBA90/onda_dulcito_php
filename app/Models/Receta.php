<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $attributes = [
        'activo' => false
    ];

    public function users()
    {
        return $this->hasOne(User::class);
    }
}
