<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Nosotrosdetalle;
use App\Models\OurImg;
/**
 * Class Nosotros
 * @package App\Models
 * @version November 22, 2021, 1:51 am UTC
 *
 * @property string $seccion
 */
class Nosotros extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'our_information';
    

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

    
    public function getOurTextImg()
    {
        //return $this->hasMany(OurImg::class,'our_id','id');
        return $this->hasMany('App\Models\OurImg', 'our_id')->select('img')->where('our_id', 1);
        //return $this->belongsTo('App\Models\Nosotros', 'nosotros_id');

    }
  
    public function getSeccionOne()
    {
        return $this->hasMany('App\Models\Nosotrosdetalle', 'nosotros_id');
    }
    public function getSeccionThree() 
    {
        return $this->hasMany('App\Models\OurImg', 'our_id');
    }
   
    public function getSeccionFour()
    {
        return $this->hasMany('App\Models\OurImg', 'our_id');
    }

    

    public function getSeccionTwo()
    {
        
        return $this->hasMany('App\Models\OurImg', 'our_id');
    }
    
    

}
