<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class category
 * @package App\Models
 * @version January 13, 2022, 3:15 am UTC
 *
 * @property string $name_category
 */
class category extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'categories';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name_category',
        'img'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_category' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_category' => 'required',
        //'img'  => 'required'
    ];

    public function getTakeAxxion()
    {
        return $this->hasMany('App\Models\TakeAxxion', 'category_id');
    }
}
