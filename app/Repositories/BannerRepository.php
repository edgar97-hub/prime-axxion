<?php

namespace App\Repositories;

use App\Http\Requests\API\CreateBannerAPIRequest;
use App\Http\Requests\API\UpdateBannerAPIRequest;
use App\Models\Banner;
use App\Repositories\BaseRepository;
use Intervention\Image\Facades\Image;

/**
 * Class BannerRepository
 * @package App\Repositories
 * @version November 17, 2021, 11:20 pm UTC
*/

class BannerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulolight',
        'titulonegrita',
        'textogeneral',
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

    public function createBanner(CreateBannerAPIRequest $request)
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
    public function updateBanner($id,UpdateBannerAPIRequest $request)
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
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Banner::class;
    }
}
