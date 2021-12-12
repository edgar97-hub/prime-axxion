<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use DB;
use App\Models\Nosotrosdetalle;
use App\Models\OurImg;
use App\Models\Nosotros;

/**
 * Class NosotrosRepository
 * @package App\Repositories
 * @version November 22, 2021, 1:51 am UTC
*/

class NosotrosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'seccion'
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
        return Nosotros::class;
    }
    public function getDetails($nosotros)
    {

 

      $SeccionOne = Nosotros::with(['getSeccionOne' => function($query){
      $query->select('title','textcolumn1','textcolumn2','nosotros_id');
      }])->where('id', 1)
      ->get();

      $SeccionTwo = Nosotros::with(['getSeccionTwo' => function($query){
      $query->select('img', 'textitle','our_id');
      }])->where('id', 2)
      ->get();

      $SeccionThree = Nosotros::with(['getSeccionThree' => function($query){
      $query->select('img','our_id');
      }])
      ->select('id','seccion')->where('id', 3)
      ->get();

      $SeccionFour = Nosotros::with(['getSeccionFour' => function($query){
      $query->select('img','our_id');
      }])
      ->select('id','seccion')->where('id', 4)
      ->get();
      
      $SeccionOne = json_decode($SeccionOne);
      $SeccionTwo = json_decode($SeccionTwo);
      $SeccionThree = json_decode($SeccionThree);
      $SeccionFour = json_decode($SeccionFour);

      foreach ($SeccionTwo[0]->get_seccion_two as $value) 
      {
        $value->img = url('/'.$value->img);

      }
      foreach ($SeccionThree[0]->get_seccion_three as $value) 
      {
        $value->img = url('/'.$value->img);

      }
      foreach ($SeccionFour[0]->get_seccion_four as $value) 
      {
        $value->img = url('/'.$value->img);

      }
      $data['azúl'] =  $SeccionOne[0]->get_seccion_one;
      $data['fotografía institucional'] = $SeccionTwo[0]->get_seccion_two;
      $data['somos parte de'] = $SeccionThree[0]->get_seccion_three;
      $data['bancos'] = $SeccionFour[0]->get_seccion_four;
      
     return  $data;

    }
    public function getNosotros($our_information)
    {
       
      $our_details = Nosotros::join('our_details', 'our_information.id', '=', 'our_details.Nosotros_id')
      ->where('our_details.Nosotros_id', $our_information['id'])
      ->get(['our_details.*']);

      $our_img = Nosotros::join('our_img', 'our_information.id', '=', 'our_img.our_id')
      ->where('our_img.our_id', $our_information['id'])
      ->get(['our_img.*']);
      
      foreach ($our_img as $data) 
      {
        $data['img'] = url('/storage/'.$data['img']);

      }
      $our_information['our_details'] = $our_details;
      $our_information['our_img'] = $our_img;
      
      return $our_information;
    }
    public function searchSection(Request $request, $vendor){

      $output = '';
      if($request->ajax()) {
          $data = Nosotros::where('seccion', 'LIKE', '%'.$vendor.'%')
              ->get();
          if (count($data)>0) {
              $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
              foreach ($data as $row){
                  $output .= '<li  data-id="'.$row->id.'"  class="list-group-item">'.$row->seccion.'</li>';

              }
              $output .= '</ul>';
          }
          else {
              $output .= '<li class="list-group-item">'.'No results'.'</li>';
          }
      }
      return $output;

  }
}
