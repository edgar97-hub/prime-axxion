<?php

namespace App\Repositories;

use App\Models\Nosotros;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
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
      foreach ($nosotros as $value) 
        {
          $Nosotrosdetalles = Nosotros::join('nosotrosdetalles', 'nosotros.id', '=', 'nosotrosdetalles.Nosotros_id')
          ->where('nosotrosdetalles.Nosotros_id', $value['id'])
          ->get(['nosotrosdetalles.*']);
          foreach ($Nosotrosdetalles as $data) 
          {
            $data['img'] = url('/storage/'.$data['img']);

          }
          $value['content'] = $Nosotrosdetalles;
        }
      return $nosotros;
    }
    public function getNosotros($nosotros)
    {
      foreach ($nosotros as $value) 
      {
        $Nosotrosdetalles = Nosotros::join('nosotrosdetalles', 'nosotros.id', '=', 'nosotrosdetalles.Nosotros_id')
        ->where('nosotrosdetalles.Nosotros_id', $nosotros['id'])
        ->get(['nosotrosdetalles.*']);
        foreach ($Nosotrosdetalles as $data) 
        {
          $data['img'] = url('/storage/'.$data['img']);

        }
        $nosotros['content'] = $Nosotrosdetalles;

      }
      return $nosotros;
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
