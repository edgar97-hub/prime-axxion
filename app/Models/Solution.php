<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Solution
 * @package App\Models
 * @version November 21, 2021, 4:34 pm UTC
 *
 * @property string $title
 * @property string $titulolight
 * @property string $titulonegrita
 * @property string $img
 */
class Solution extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'solutions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'titulolight',
        'titulonegrita',
        'img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'titulolight' => 'string',
        'titulonegrita' => 'string',
  

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' =>  'required',
        'titulolight' =>  'required',
        'titulonegrita' => 'required',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       
          
    ];

    
}
