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
class OurImg extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'our_img';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'img',
        'our_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        //'title' => 'string',
        //'textcolumn1' => 'string',
        //'textcolumn2' => 'string',
        //'textitle' => 'string',
        //'nosotros_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'img' => 'required',
         'our_id' => 'required',
         //'textitle' => 'required'
    ];
    public function getOurInformationImg()
    {
        //return $this->belongsTo(Nosotros::class, 'id','id');
        return $this->belongsTo('App\Models\Nosotros', 'our_id');
    }
    public function getSeccionThree()
    {
        return $this->belongsTo('App\Models\Nosotros', 'our_id')->select('seccion,img')->where('our_id', 3);
    }
    public function getSeccionFour()
    {
        return $this->belongsTo('App\Models\Nosotros', 'our_id')->select('seccion,img')->where('our_id', 4);;
    }
    
}
