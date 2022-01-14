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


      $data = TakeAxxion::with(['getCategory','getUser' => function($query)
      {
        
      }])
      ->get();
      //$data = json_decode($data);


      return $data;
    }

    public function getTakeAxxion($id)
    {

      $data = TakeAxxion::with(['getCategory','getUser' => function($query)
      {
        
      }])
      ->where('take_axxions.id', $id)
      ->get();
      $data = json_decode($data);


      return $data;
    }
}
