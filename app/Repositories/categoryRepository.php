<?php

namespace App\Repositories;

use App\Models\category;
use App\Repositories\BaseRepository;
use App\Models\TakeAxxion;

/**
 * Class categoryRepository
 * @package App\Repositories
 * @version January 13, 2022, 3:15 am UTC
*/

class categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_category',
        'img'

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
        return category::class;
    }
     
}
