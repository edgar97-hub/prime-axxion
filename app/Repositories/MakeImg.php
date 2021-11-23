<?php
namespace App\Repositories;

trait MakeImg 
{
     
    public function makeImg($request,$filePath)
    {

      if (!file_exists(storage_path($filePath))) {
         mkdir(storage_path($filePath), 777, true);
      }
      $input = $request->all();
      $file = $request->file('img');
      $name = uniqid().'.'.$file->getClientOriginalExtension();
      $path = $filePath.$name;
      $input['img'] = $path;
      $file->storeAs($filePath, $name, 'public');
      return $input;
    }
    public function updateImg($request,$filePath,$value)
    {
      if (!file_exists(storage_path($filePath))) {
         mkdir(storage_path($filePath), 777, true);
      }
      $input = $request->all();
      $file = $request->file('img');
      $name = uniqid().'.'.$file->getClientOriginalExtension();
      $path = $filePath.$name;
      if (is_file(storage_path('/app/public/'.$value['img'])))
      {   
        unlink(storage_path('/app/public/'.$value['img']));
      }
      $input['img'] = $path;
      $file->storeAs($filePath, $name, 'public');
      return $input;
    }
    public function deleteImg($filePath,$value)
    {
      
       
      if (is_file(storage_path('/app/public/'.$value['img'])))
      {   
        unlink(storage_path('/app/public/'.$value['img']));
      }
    }
}