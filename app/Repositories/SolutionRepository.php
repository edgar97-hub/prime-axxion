<?php

namespace App\Repositories;

use App\Models\Solution;
use App\Repositories\BaseRepository;

use App\Http\Requests\API\CreateSolutionAPIRequest;
use App\Http\Requests\API\UpdateSolutionAPIRequest;
use Intervention\Image\Facades\Image;
use App\Repositories\MakeImg;
/**
 * Class SolutionRepository
 * @package App\Repositories
 * @version November 21, 2021, 4:34 pm UTC
*/

class SolutionRepository extends BaseRepository
{
    /**
     * @var array
     */

    use MakeImg;
    protected $fieldSearchable = [
        'title',
        'titulolight',
        'titulonegrita',
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
        return Solution::class;
    }
    public function createT(CreateSolutionAPIRequest $request)
    {
      $filePath = 'img/solution/';
      $input = $this->makeImg($request,$filePath);

      return $this->create($input);
    }
    public function updateT($id,UpdateSolutionAPIRequest $request)
    {
      $filePath = 'img/solution/';
      $nosotrosdetalle = $this->find($id);
      $input = $this->updateImg($request,$filePath,$nosotrosdetalle);
      return $this->update($input, $id);
    }
}
