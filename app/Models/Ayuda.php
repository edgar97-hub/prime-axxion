<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ayuda
 * @package App\Models
 * @version December 3, 2021, 3:00 am UTC
 *
 * @property string $pregunta
 * @property string $respuesta
 */
class Ayuda extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ayudas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'pregunta',
        'respuesta'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'pregunta' => 'string',
        'respuesta' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pregunta' => 'required',
        //'respuesta' => 'required'
    ];

    
}
