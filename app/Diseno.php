<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Diseno
 *
 * @property $id
 * @property $producto_id
 * @property $categoria_id
 * @property $clave
 * @property $imagen_ligera
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Diseno extends Model
{
    
    static $rules = [
		'clave' => 'required',
		'imagen_ligera' => 'required',
		'imagen' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['producto_id','categoria_id','clave','imagen_ligera','imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Producto', 'id', 'producto_id');
    }
    

}
