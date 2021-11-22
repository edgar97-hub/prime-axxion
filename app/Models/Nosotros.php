<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Nosotros
 * @package App\Models
 * @version November 22, 2021, 1:51 am UTC
 *
 * @property string $seccion
 */
class Nosotros extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'nosotros';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'seccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'seccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'seccion' =>  'required|string|max:255'
    ];

    
}
