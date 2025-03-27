<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;
    protected $filiable=[
        'nombre',
         'marca',
        'modelo',
        'color',
        'dimension',
        'descripcion',
        'observacion',
        'es_activo',
        'categoria_id'


    ];
// modicando el codigo para que se pueda hacer la relacion de uno a muchos
    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id');

    }
}
