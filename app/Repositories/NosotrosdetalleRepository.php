<?php

namespace App\Repositories;

use App\Models\Nosotrosdetalle;
use App\Repositories\BaseRepository;


use App\Http\Requests\API\CreateNosotrosdetalleAPIRequest;
use App\Http\Requests\API\UpdateNosotrosdetalleAPIRequest;
use Intervention\Image\Facades\Image;

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
      $input = $request->all();
      $file = $request->file('img');
      $extension = $file->getClientOriginalExtension();
      $path ='storage'.uniqid().'.'.$extension;
      $img = Image::make($request->file('img')->getRealPath());
      $img->save(public_path($path));
      $input['img'] = $path;

      return $this->create($input);
    }
    public function updateUs($id,UpdateNosotrosdetalleAPIRequest $request)
    {
      $input = $request->all();
      $file = $request->file('img');
      $extension = $file->getClientOriginalExtension();
      $path ='storage'.uniqid().'.'.$extension;
      $img = Image::make($request->file('img')->getRealPath());
      $img->save(public_path($path));
      $input['img'] = $path;
      
      return $this->update($input, $id);
    }
}
