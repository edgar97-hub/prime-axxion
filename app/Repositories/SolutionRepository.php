<?php

namespace App\Repositories;

use App\Models\Solution;
use App\Repositories\BaseRepository;

use App\Http\Requests\API\CreateSolutionAPIRequest;
use App\Http\Requests\API\UpdateSolutionAPIRequest;
use Intervention\Image\Facades\Image;
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
      $input = $request->all();
      $file = $request->file('img');
      $extension = $file->getClientOriginalExtension();
      $path ='storage'.uniqid().'.'.$extension;
      $img = Image::make($request->file('img')->getRealPath());
      $img->save(public_path($path));
      $input['img'] = $path;

      return $this->create($input);
    }
    public function updateT($id,UpdateSolutionAPIRequest $request)
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
