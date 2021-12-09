<?php
namespace App\Repositories;
use Illuminate\Support\Facades\Storage;

trait MakeImg 
{
     
    public function makeImg($request,$filePath)
    {

      if (!file_exists(storage_path($filePath))) {
         Storage::makeDirectory('public/'.$filePath, 0777, true);
      }
      $input = $request->all();
      $file = $request->file('img');
      $name = uniqid().'.'.$file->getClientOriginalExtension();
      $path = $filePath.$name;
      $input['img'] = $path;
      $file->storeAs('public/'.$filePath, $name);
      return $input;
    }
    public function updateImg($request,$filePath,$value)
    {
      if (!file_exists(storage_path($filePath))) {
         Storage::makeDirectory('public/'.$filePath, 0777, true);
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
      $file->storeAs('public/'.$filePath, $name);
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