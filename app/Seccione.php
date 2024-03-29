<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Seccione
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Seccione extends Model
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
    protected $fillable = ['nombre','imagen'];

    // productos relacionados
    public function productos()
    {
        return $this->hasMany('App\Producto', 'seccion_id', 'id');
    }

}
