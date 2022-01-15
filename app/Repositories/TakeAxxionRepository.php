<?php

namespace App\Repositories;

use App\Models\TakeAxxion;
use App\Models\User;
use App\Repositories\BaseRepository;
use App\Models\category;
use DB;

/**
 * Class TakeAxxionRepository
 * @package App\Repositories
 * @version January 13, 2022, 3:02 am UTC
*/

class TakeAxxionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
        'level',
        'number_visits',
        'title',
        'user_id',
        'light_text_1',
        'img_1',
        'light_text_2',
        'img_2',
        'light_text_3',
        'body',
        'video',
        'podcast'
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

    public static function  getEnums($table , $field)
    {

        $row =  DB::select( DB::raw("SHOW COLUMNS FROM {$table} WHERE Field = '{$field}'") )[0]->Type;
   
         
        preg_match("/^enum\(\'(.*)\'\)$/", $row, $matches);
        $enums = explode("','", $matches[1]);
        return $enums;
    }
    public function allTakeAxxions()
    {

      $category = category::with(['getTakeAxxion' => function($query)
      {
        $query->select('title','level','category_id');
      }])
      ->get();


     
      $category = json_decode($category);
      
      //foreach ($SeccionTwo[0]->get_seccion_two as $value) 
      //{
        //$value->img = url('/storage/'.$value->img);

      //}
      //$data['azúl'] =  $SeccionOne[0]->get_seccion_one;
       
      dd($category);

     return  $category;

    }
    public function getCategories()
    {
      $categories = category::all()
               ->sortBy('name_category');
      $categories = json_decode($categories);
      return $categories;
    }
    public function getUsers()
    {
      $users = User::all()
               ->sortBy('name');
      $users = json_decode($users);
      return $users;
    }
    public function getTakeAxxionIndex()
    {
      //$take_axxions = category::join('take_axxions', 'categories.id', '=', 'take_axxions.category_id')
      //->where('our_details.category_id', $our_information['id'])
      //->get(['categories.name_category','take_axxions.*']);
      //$data = json_decode($data);
      $data = TakeAxxion::with(['getCategory','getUser'])
      ->get();
      return $data;
    }

    public function getTakeAxxion($id)
    {
      $data = TakeAxxion::with(['getCategory','getUser'])
      ->where('take_axxions.id', $id)
      ->get();
      $data = json_decode($data);
      return $data;
    }
    

    public function getRecordTakeAxxion($id)
    {

      $data = TakeAxxion::with(['getCategory','getUser' => function($query)
      {
       $query->select('id','name');
      }])->select('id','category_id','level','number_visits','user_id','title','short_description','img','body','video_1','video_2','podcast','created_at')
      ->where('id', $id)
      ->get();
      foreach ($data as $value) 
      {
        $value->img = url('/storage/'.$value->img);
        $value->video_1 = url('/storage/'.$value->video_1);
        $value->video_2 = url('/storage/'.$value->video_2);
        $value->podcast = url('/storage/'.$value->podcast);
        //$value['name_category'];
        //$value['name_user'];
      }
      $data = json_decode($data);

      //foreach ($getTakeAxxion as $value) 
      //{
        //$value->name_category = $value->get_category->name_category;
        //$value->name_user = $value->get_user->name;
      //}

      //dd($getTakeAxxion);

     return  $data;

    }
    public function getTakeAxxionMostVisits()
    {

      $data = TakeAxxion::with(['getCategory','getUser' => function($query)
      {
       $query->select('id','name');
      }])->select('id','category_id','level','number_visits','user_id','title','short_description','img','body','video_1','video_2','podcast','created_at')
      -> orderBy('number_visits', 'desc')
      ->take(2)
      ->get();
      foreach ($data as $value) 
      {
        $value->img = url('/storage/'.$value->img);
        $value->video_1 = url('/storage/'.$value->video_1);
        $value->video_2 = url('/storage/'.$value->video_2);
        $value->podcast = url('/storage/'.$value->podcast);
      }
      $data = json_decode($data);
     return  $data;
    }

    public function getCategoryLevels($category_id,$level)
    {

      if($category_id != null)
      {
        if($level == 'all')
        {
          $data = TakeAxxion::with(['getCategory','getUser' => function($query)
          {
          $query->select('id','name');
          }])->select('id','category_id','level','number_visits','user_id','title','short_description','img','body','video_1','video_2','podcast','created_at')
          ->where('category_id', $category_id)
          -> orderBy('number_visits', 'desc')
          ->get();
          foreach ($data as $value) 
          {
            $value->img = url('/storage/'.$value->img);
            $value->video_1 = url('/storage/'.$value->video_1);
            $value->video_2 = url('/storage/'.$value->video_2);
            $value->podcast = url('/storage/'.$value->podcast);
          }
          $data = json_decode($data);
        }
        else
        {
          $data = TakeAxxion::with(['getCategory','getUser' => function($query)
          {
          $query->select('id','name');
          }])->select('id','category_id','level','number_visits','user_id','title','short_description','img','body','video_1','video_2','podcast','created_at')
          ->where([
            ['category_id', '=', $category_id],
            ['level', '=', $level],
          ])
          -> orderBy('number_visits', 'desc')
          ->get();
          foreach ($data as $value) 
          {
            $value->img = url('/storage/'.$value->img);
            $value->video_1 = url('/storage/'.$value->video_1);
            $value->video_2 = url('/storage/'.$value->video_2);
            $value->podcast = url('/storage/'.$value->podcast);
          }
          $data = json_decode($data);
            
        }
        
      }
     return  $data;
    }
    public function getTakeAxxionTrends()
    {

      $MostViewed = TakeAxxion::with(['getCategory','getUser' => function($query)
      {
       $query->select('id','name');
      }])->select('id','category_id','level','number_visits','user_id','title','short_description','img','body','video_1','video_2','podcast','created_at')
      -> orderBy('number_visits', 'desc')
      ->take(3)
      ->get();

      foreach ($MostViewed as $value) 
      {
        $value->img = url('/storage/'.$value->img);
        $value->video_1 = url('/storage/'.$value->video_1);
        $value->video_2 = url('/storage/'.$value->video_2);
        $value->podcast = url('/storage/'.$value->podcast);
      }

      $TheNew = TakeAxxion::with(['getCategory','getUser' => function($query)
      {
       $query->select('id','name');
      }])->select('id','category_id','level','number_visits','user_id','title','short_description','img','body','video_1','video_2','podcast','created_at')
      -> orderBy('created_at', 'desc')
      ->take(3)
      ->get();

      $TheNew;
      foreach ($TheNew as $value) 
      {
        $value->img = url('/storage/'.$value->img);
        $value->video_1 = url('/storage/'.$value->video_1);
        $value->video_2 = url('/storage/'.$value->video_2);
        $value->podcast = url('/storage/'.$value->podcast);
      }


      $results = DB::select('SELECT category_id , number_visits
                             FROM (SELECT 	category_id,number_visits,
                                            @category_rank := IF(@category_country = category_id, @category_rank + 1, 1) AS 	category_rank,
                                            @category_country := category_id 
                                   FROM take_axxions
                                   ORDER BY category_id,number_visits DESC) ranked
                             WHERE category_rank = 1;');
       
      $data;
      $data['MostViewed'] =  $MostViewed;
      $data['TheNew'] =  $TheNew;
      foreach ($results as $value) 
      {
        $MostViewedbyCategory = TakeAxxion::with(['getCategory','getUser' => function($query)
        {
         $query->select('id','name');
        }])->select('id','category_id','level','number_visits','user_id','title','short_description','img','body','video_1','video_2','podcast','created_at')
        ->where('category_id', $value->category_id)
        -> orderBy('number_visits', 'desc')
        ->take(1)
        ->get();

        $MostViewedbyCategory = json_decode($MostViewedbyCategory);

        if(!count($MostViewedbyCategory) == 0)
        {
          $MostViewedbyCategory[0]->img = url('/storage/'.$MostViewedbyCategory[0]->img);
          $MostViewedbyCategory[0]->video_1 = url('/storage/'.$MostViewedbyCategory[0]->video_1);;
          $MostViewedbyCategory[0]->video_2 = url('/storage/'.$MostViewedbyCategory[0]->video_2);;
          $MostViewedbyCategory[0]->podcast = url('/storage/'.$MostViewedbyCategory[0]->podcast);;

        }
        $data['MostViewedbyCategory'][$MostViewedbyCategory[0]->get_category->name_category] =  $MostViewedbyCategory;
      }
      
     return  $data;
    }


}
