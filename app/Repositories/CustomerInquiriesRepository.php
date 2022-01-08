<?php

namespace App\Repositories;

use App\Models\CustomerInquiries;
use App\Repositories\BaseRepository;

/**
 * Class CustomerInquiriesRepository
 * @package App\Repositories
 * @version January 8, 2022, 10:46 pm UTC
*/

class CustomerInquiriesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'last_name',
        'email',
        'telephone',
        'country',
        'investor_in_financial_assests',
        'comment'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CustomerInquiries::class;
    }
}
