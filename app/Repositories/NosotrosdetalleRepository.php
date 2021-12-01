<?php

namespace App\Repositories;

use App\Models\Nosotrosdetalle;
use App\Repositories\BaseRepository;
use App\Http\Requests\API\CreateNosotrosdetalleAPIRequest;
use App\Http\Requests\API\UpdateNosotrosdetalleAPIRequest;
use Intervention\Image\Facades\Image;
use App\Repositories\MakeImg;
 
/**
 * Class NosotrosdetalleRepository
 * @package App\Repositories
 * @version November 22, 2021, 2:17 am UTC
*/

class NosotrosdetalleRepository extends BaseRepository 
{
    /**
     * @var array
     */

    use MakeImg;
    protected $fieldSearchable = [
        'title',
        'textcolumn1',
        'textcolumn2',
        'textitle',
        'img',
        'nosotros_id'
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
        return Nosotrosdetalle::class;
    }
    public function createUs(CreateNosotrosdetalleAPIRequest $request)
    {
      $filePath = 'img/nosotrosdetalles/';
      $input = $this->makeImg($request,$filePath);
      return $this->create($input);
      
    }
    public function updateUs($id,UpdateNosotrosdetalleAPIRequest $request)
    {

      $filePath = 'img/nosotrosdetalles/';
      $nosotrosdetalle = $this->find($id);
      $input = $this->updateImg($request,$filePath,$nosotrosdetalle);
      return $this->update($input, $id);
    }
}
