<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Categoria extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 10000;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];

    public function diseno()
    {
        return $this->hasMany('App\Diseno', 'categoria_id', 'id');
    }
    public function productoCategoria()
    {
        return $this->hasMany('App\ProductosCategoria', 'categoria_id', 'id');
    }

}
