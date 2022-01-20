<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CalltoAction
 * @package App\Models
 * @version December 2, 2021, 9:18 pm UTC
 *
 * @property string $title
 * @property string $img
 */
class CalltoAction extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'callto_actions';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'img'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'img' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //'title' => 'required',
        //'img' => 'mimes:mp4,mov | max:20000'
        
    ];

    
}
