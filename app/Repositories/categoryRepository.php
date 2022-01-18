<?php

namespace App\Repositories;

use App\Models\category;
use App\Repositories\BaseRepository;
use App\Models\TakeAxxion;

/**
 * Class categoryRepository
 * @package App\Repositories
 * @version January 13, 2022, 3:15 am UTC
*/

class categoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name_category',
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
        return category::class;
    }
    public function getcategory($category_id)
    {
      $category = TakeAxxion::with(['getCategory','getUser' => function($query)
      {
       $query->select('id','name');
      }])->select('id','category_id','level','number_visits','user_id','title','short_description','img','body','video_1','video_2','podcast','created_at')
      ->where('category_id', $category_id)
      -> orderBy('number_visits', 'desc')
      ->take(3)
      ->get();

      foreach ($category as $value) 
      {
        $value->img = url('/storage/'.$value->img);
        $value->video_1 = url('/storage/'.$value->video_1);
        $value->video_2 = url('/storage/'.$value->video_2);
        $value->podcast = url('/storage/'.$value->podcast);
      }
      return  $category;

    }
}
