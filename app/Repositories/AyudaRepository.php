<?php

namespace App\Repositories;

use App\Models\Ayuda;
use App\Repositories\BaseRepository;

/**
 * Class AyudaRepository
 * @package App\Repositories
 * @version December 3, 2021, 3:00 am UTC
*/

class AyudaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pregunta',
        'respuesta'
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
        return Ayuda::class;
    }
}
