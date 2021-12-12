<?php

namespace App\Repositories;

use App\Models\OurImg;
use App\Repositories\BaseRepository;
use DB;

/**
 * Class ImgRepository
 * @package App\Repositories
 * @version December 11, 2021, 11:24 pm UTC
*/

class ImgRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'textitle',
        'img',
        'our_id'
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
        return OurImg::class;
    }
    public function getTextImg($id)
    {
      $details = DB::table('our_information')
      ->leftjoin('our_img', 'our_img.our_id', '=', 'our_information.id')
      ->where('our_information.id', '=', $id)
      ->select('our_information.id','our_information.seccion','our_img.textitle','our_img.img','our_img.id AS img_id')
      ->get();
      

      return $details;
    }
}
