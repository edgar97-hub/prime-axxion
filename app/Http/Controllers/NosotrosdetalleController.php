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
     
        return redirect(route('nosotrosdetalles.index'));
    }

    /**
     * Display the specified CalltoAction.
     *
     * @param int $id
     *
     * @return Response
     */
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

        return view('nosotrosdetalles.show')->with('nosotrosdetalles', $nosotrosdetalles);
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

        if (empty($nosotrosdetalles)) {
            Flash::error('nosotrosdetalles not found');

            return redirect(route('nosotrosdetalles.index'));
        }

        return view('nosotrosdetalles.edit')->with('nosotrosdetalles', $nosotrosdetalles);
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

        return redirect(route('nosotrosdetalles.index'));
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

        return redirect(route('nosotrosdetalles.index'));
    }
   
}
