<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Banner
 * @package App\Models
 * @version November 17, 2021, 11:20 pm UTC
 *
 * @property string $titulolight
 * @property string $titulonegrita
 * @property string $textogeneral
 * @property string $img
 */
class Banner extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'banners';
    

    protected $dates = ['deleted_at'];


    public function getPathImg()
    {
      return \Storage::url($this->path);
    }
    public $fillable = [
        'titulolight',
        'titulonegrita',
        'textogeneral',
        'img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'titulolight' => 'string',
        'titulonegrita' => 'string',
        'textogeneral' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'titulolight' => 'requerid',
        //'titulonegrita' => 'requerid',
        //'textogeneral' => 'requerid',
        //'img' => 'requerid',
        'titulolight' => 'required|string|max:255',
        'titulonegrita' => 'required|string|max:255',
        'textogeneral' => 'required|string|max:255',
        'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    
}
