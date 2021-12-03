<?php

namespace App\Repositories;

use App\Models\CalltoAction;
use App\Repositories\BaseRepository;
use App\Repositories\MakeImg;
/**
 * Class CalltoActionRepository
 * @package App\Repositories
 * @version December 2, 2021, 9:18 pm UTC
*/

class CalltoActionRepository extends BaseRepository
{
    /**
     * @var array
     */
    use MakeImg;
    protected $fieldSearchable = [
        'title',
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
        return CalltoAction::class;
    }

   
    public function createCallActionRepository($request)
    {

      $filePath = 'img/callAction/';
      $input = $this->makeImg($request,$filePath);
      return $this->create($input);
      
    }
    public function updateCallActionRepository($id,$request)
    {
      $filePath = 'img/callAction/';
      $nosotrosdetalle = $this->find($id);
      $input = $this->updateImg($request,$filePath,$nosotrosdetalle);
      
      return $this->update($input, $id);
    }
}
