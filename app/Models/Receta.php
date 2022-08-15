<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'publicar',
        'activo',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
        'publicar',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/recetas/'.$this->getKey());
    }
}
