<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TakeAxxion
 * @package App\Models
 * @version December 3, 2021, 1:41 am UTC
 *
 * @property string $img
 * @property string $title
 * @property string $description
 */
class TakeAxxion extends Model
{
    use SoftDeletes;

    //use HasFactory;

    public $table = 'take_axxions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'img',
        'title',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'img' => 'string',
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'img' => 'required',
        'title' => 'required',
        //'description' => 'required'
    ];

    
}
