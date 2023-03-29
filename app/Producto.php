<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 *
 * @property $id
 * @property $seccion_id
 * @property $clave
 * @property $nombre
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @property Seccione $seccione
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends Model
{
    
    static $rules = [
		'clave' => 'required',
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['seccion_id','clave','nombre','descripcion','imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function seccion()
    {
        return $this->hasOne('App\Seccione', 'id', 'seccion_id');
    }
    public function categoria()
    {
        return $this->hasMany('App\ProductosCategoria', 'producto_id', 'id');
    }
    
}
