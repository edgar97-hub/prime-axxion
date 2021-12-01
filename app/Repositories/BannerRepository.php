<?php

namespace App\Repositories;

use App\Http\Requests\API\CreateBannerAPIRequest;
use App\Http\Requests\API\UpdateBannerAPIRequest;
use App\Models\Banner;
use App\Repositories\BaseRepository;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Repositories\MakeImg;
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

    use MakeImg;
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

      $filePath = 'img/banner/';
      $input = $this->makeImg($request,$filePath);
      return $this->create($input);
      
    }
    public function updateBanner($id,UpdateBannerAPIRequest $request)
    {
      $filePath = 'img/banner/';
      $nosotrosdetalle = $this->find($id);
      $input = $this->updateImg($request,$filePath,$nosotrosdetalle);
      
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
