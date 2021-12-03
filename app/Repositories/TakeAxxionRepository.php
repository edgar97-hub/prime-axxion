<?php

namespace App\Repositories;

use App\Models\TakeAxxion;
use App\Repositories\BaseRepository;
use App\Repositories\MakeImg;
/**
 * Class TakeAxxionRepository
 * @package App\Repositories
 * @version December 3, 2021, 1:41 am UTC
*/

class TakeAxxionRepository extends BaseRepository
{
    /**
     * @var array
     */
    use MakeImg;
    protected $fieldSearchable = [
        'img',
        'title',
        'description'
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
        return TakeAxxion::class;
    }
    public function createTakeAxxionRepository($request)
    {

      $filePath = 'img/takeaxxion/';
      $input = $this->makeImg($request,$filePath);
      return $this->create($input);
      
    }
    public function updateTakeAxxionRepository($id,$request)
    {
      $filePath = 'img/takeaxxion/';
      $nosotrosdetalle = $this->find($id);
      $input = $this->updateImg($request,$filePath,$nosotrosdetalle);
      
      return $this->update($input, $id);
    }
}
