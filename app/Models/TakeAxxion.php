<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\category;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class TakeAxxion
 * @package App\Models
 * @version January 13, 2022, 3:02 am UTC
 *
 * @property integer $category_id
 * @property string $level
 * @property integer $number_visits
 * @property string $title
 * @property integer $user_id
 * @property string $light_text_1
 * @property string $img_1
 * @property string $light_text_2
 * @property string $img_2
 * @property string $light_text_3
 * @property string $body
 * @property string $video
 * @property string $podcast
 */
class TakeAxxion extends Model implements HasMedia
{
    //use SoftDeletes;

    use HasFactory;
    use InteractsWithMedia;

    public $table = 'take_axxions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'category_id',
        'level',
        'number_visits',
        'title',
        'user_id',
        'short_description',
        'img',
        'body',
        'video_1',
        'video_2',
        'podcast'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
        'level' => 'string',
        'number_visits' => 'integer',
        'user_id' => 'integer',
         
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'category_id' => 'required',
        //'user_id' => 'required',
        //'body'=> 'required',
    ];

    public function getCategory()
    {
         return $this->belongsTo('App\Models\category', 'category_id');
    }
    public function getUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getTakeAxxion()
    {
        return $this->belongsTo('App\Models\category', 'category_id');
    }

    
   


    
}
