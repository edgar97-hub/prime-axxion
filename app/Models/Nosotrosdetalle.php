<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Nosotros;
/**
 * Class Nosotrosdetalle
 * @package App\Models
 * @version November 22, 2021, 2:17 am UTC
 *
 * @property string $title
 * @property string $textcolumn1
 * @property string $textcolumn2
 * @property string $textitle
 * @property string $img
 * @property integer $nosotrosde_id
 * @property integer $nosotros_id
 */
class Nosotrosdetalle extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'our_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'textcolumn1',
        'textcolumn2',
        'textitle',
        //'img',
        'nosotros_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'textcolumn1' => 'string',
        'textcolumn2' => 'string',
        'textitle' => 'string',
        'nosotros_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'title' => 'required',
        //'textcolumn1' => 'required',
        //'textcolumn2' => 'required',
        //'textitle' => 'required',
        //'img' => 'required',
         //'nosotros_id' => 'required'
    ];
    
    public function getSeccionOnew()
    {
        return $this->belongsTo('App\Models\Nosotros', 'nosotros_id')->select('seccion')->where('nosotros_id', 1);
    }
    public function getSeccionTwo()
    {
        return $this->belongsTo('App\Models\Nosotros');
    }
    
    public function getSeccionOne()
    {
        return $this->belongsTo('App\Models\Nosotros', 'nosotros_id');
    }
}
