<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNosotrosdetalleRequest;
use App\Http\Requests\UpdateNosotrosdetalleRequest;
use App\Repositories\NosotrosdetalleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\MakeImg;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
class NosotrosdetalleController extends AppBaseController
{
    /** @var  NosotrosdetalleRepository */
    private $NosotrosdetalleRepository;
    use MakeImg;
    public function __construct(NosotrosdetalleRepository $NosotrosdetalleRepository)
    {
        $this->NosotrosdetalleRepository = $NosotrosdetalleRepository;
    }

    /**
     * Display a listing of the CalltoAction.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $nosotrosdetalles = $this->NosotrosdetalleRepository->all();
        $request = Request::create('api/nosotros', 'GET');
        $nosotrosdetalles = Route::dispatch($request)->getContent();
        $response = json_decode($nosotrosdetalles);
       //dd($request);
        return view('nosotrosdetalles.index')
           ->with('response', $response);
    }

    /**
     * Show the form for creating a new CalltoAction.
     *
     * @return Response
     */
    public function create()
    {
        return view('nosotrosdetalles.create');
    }
    public function createourimformation($id)
    {
        return view('nosotrosdetalles.create')->with('our_information', $id);
    }
    /**
     * Store a newly created CalltoAction in storage.
     *
     * @param CreateCalltoActionRequest $request
     *
     * @return Response
     */
    public function store(CreateNosotrosdetalleRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
          $filePath = 'img/nosotrosdetalles/';
           $input = $this->makeImg($request,$filePath);
        }
        Flash::success('nosotrosdetalles saved successfully.');
        $this->NosotrosdetalleRepository->create($input);
        return redirect(route('nosotrosdetalles.section',$request['nosotros_id']));
    }

    /**
     * Display the specified CalltoAction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function section($id)
    {
        $nosotrosdetalles = $this->NosotrosdetalleRepository->find($id);
        $request = Request::create('api/nosotros/'.$id, 'GET');
        $content = Route::dispatch($request)->getContent();
        $response = json_decode($content);
       

        //$nosotrosdetalles['response'] = $response->data;
       
       //$data = json_encode($response);
       //dd($response->data->our_details[1]->id);
       foreach((array)$response->data as $value) {
        
        foreach((array) $value as $k=>$v) {
           //echo $value->seccion;
            //echo $v;

            //echo  $k." - ".$v->id;
            //echo $v[$k]['id'];
            //echo $v[$k]['seccion'];
        }
        }
        foreach((array) $response->data->our_details as $value) {
          //echo $value->title;
          //echo $response->data->seccion;
       }
     
  
    
         
        //if (empty($nosotrosdetalles)) {
          //  Flash::error('Nosotrosdetalle not found');
            //return view('nosotrosdetalles.index')->with('our_information', $response);
            //return redirect(route('nosotrosdetalles.index'));
        //}

        return view('nosotrosdetalles.index')->with('our_information', $response);
    }
    public function showTextImg($id)
    {       
       $details = $this->NosotrosdetalleRepository->getTextImg($id);
        //dd($details->seccion);

        return view('nosotrosdetalles.show')->with('our_details', $details);
    }
    public function editTextImg($id)
    {
      $details = $this->NosotrosdetalleRepository->getTextImg($id);
      //dd($details);

      return view('nosotrosdetalles.edit')->with('our_information', $details);
    }

    public function show($id)
    {
        $nosotrosdetalles = $this->NosotrosdetalleRepository->find($id);
        
        $request = Request::create('api/nosotros/'.$nosotrosdetalles['nosotros_id'], 'GET');
        $content = Route::dispatch($request)->getContent();
        $response = json_decode($content);
        $nosotrosdetalles['seccion'] = $response->data->seccion;
       
        if (empty($nosotrosdetalles)) {
            Flash::error('Nosotrosdetalle not found');

            return redirect(route('nosotrosdetalles.index'));
        }

        return view('nosotrosdetalles.show')->with('our_information', $nosotrosdetalles);
    }

    /**
     * Show the form for editing the specified CalltoAction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $nosotrosdetalles = $this->NosotrosdetalleRepository->find($id);
        return view('nosotrosdetalles.edit')->with('our_information', $nosotrosdetalles);
    }

    /**
     * Update the specified CalltoAction in storage.
     *
     * @param int $id
     * @param UpdateCalltoActionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNosotrosdetalleRequest $request)
    {
        $nosotrosdetalles = $this->NosotrosdetalleRepository->find($id);
        $input = $request->all();
        if (empty($nosotrosdetalles)) {
            Flash::error('nosotrosdetalles not found');

            return redirect(route('nosotrosdetalles.index'));
        }
        if ($request->hasFile('img')) {
          $filePath = 'img/nosotrosdetalles/';
          $input = $this->updateImg($request,$filePath,$nosotrosdetalles);
        }
        $this->NosotrosdetalleRepository->update($input, $id);
        Flash::success('nosotrosdetalles updated successfully.');

        return redirect(route('nosotrosdetalles.section',$nosotrosdetalles['nosotros_id']));
    }

    /**
     * Remove the specified CalltoAction from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $nosotrosdetalles = $this->NosotrosdetalleRepository->find($id);

        if (empty($nosotrosdetalles)) {
            Flash::error('nosotrosdetalles not found');

            return redirect(route('nosotrosdetalles.index'));
        }
     
        $filePath = 'img/nosotrosdetalles/';
        $this->deleteImg($filePath,$nosotrosdetalles);
        
        $this->NosotrosdetalleRepository->delete($id);

        Flash::success('nosotrosdetalles deleted successfully.');
        return redirect(route('nosotrosdetalles.section',$nosotrosdetalles['nosotros_id']));

        //return redirect(route('nosotrosdetalles.index'));
    }
   
}
