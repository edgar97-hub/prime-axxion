<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CustomerInquiries
 * @package App\Models
 * @version January 8, 2022, 10:46 pm UTC
 *
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property integer $telephone
 * @property string $country
 * @property integer $investor_in_financial_assests
 * @property string $comment
 */
class CustomerInquiries extends Model
{
    //use SoftDeletes;

    use HasFactory;

    public $table = 'customer_inquiries';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'last_name',
        'email',
        'telephone',
        'country',
        'investor_in_financial_assests',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'telephone' => 'integer',
        'country' => 'string',
        'investor_in_financial_assests' => 'integer',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
      
      'name' => 'required',
      'last_name' => 'required',
      'email' => 'required',
      'telephone' => 'required',
      'country' => 'required',
      'investor_in_financial_assests' => 'required',
      'comment' => 'required'
    ];

    
}
