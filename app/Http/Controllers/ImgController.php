<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateImgRequest;
use App\Http\Requests\UpdateImgRequest;
use App\Repositories\ImgRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\MakeImg;

class ImgController extends AppBaseController
{
    /** @var  ImgRepository */
    private $imgRepository;
    use MakeImg;
    public function __construct(ImgRepository $imgRepo)
    {
        $this->imgRepository = $imgRepo;
    }

    /**
     * Display a listing of the Img.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $imgs = $this->imgRepository->all();

        return view('imgs.index')
            ->with('imgs', $imgs);
    }
    public function getTextImg($id)
    {
      $our_information = $this->imgRepository->getTextImg($id);
      //dd($our_information[0]);
      
      

      return view('imgs.index')->with('imgs', $our_information);
    }
    /**
     * Show the form for creating a new Img.
     *
     * @return Response
     */
    public function create()
    {
        return view('imgs.create');
    }
    public function createTextImg($id)
    {

        return view('imgs.create')->with('img_id', $id);
    }
    /**
     * Store a newly created Img in storage.
     *
     * @param CreateImgRequest $request
     *
     * @return Response
     */
    public function store(CreateImgRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
          $filePath = 'img/nosotrosdetalles/';
          $input = $this->makeImg($request,$filePath);
        }


        $img = $this->imgRepository->create($input);
        Flash::success('Img saved successfully.');
        return redirect(route('imgs.getTextImg',$img['our_id']));

    }

    /**
     * Display the specified Img.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $img = $this->imgRepository->find($id);

        if (empty($img)) {
            Flash::error('Img not found');

            return redirect(route('imgs.index'));
        }
 
        return view('imgs.show')->with('img', $img);
    }

    /**
     * Show the form for editing the specified Img.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $img = $this->imgRepository->find($id);

        if (empty($img)) {
            Flash::error('Img not found');

            return redirect(route('imgs.index'));
        }

        return view('imgs.edit')->with('img', $img);
    }

    /**
     * Update the specified Img in storage.
     *
     * @param int $id
     * @param UpdateImgRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImgRequest $request)
    {
        $img = $this->imgRepository->find($id);
        $input = $request->all();
        if (empty($img)) {
            Flash::error('Img not found');

            return redirect(route('imgs.index'));
        }
        if ($request->hasFile('img')) {
          $filePath = 'img/nosotrosdetalles/';
          $input = $this->updateImg($request,$filePath,$img);
        }
      
        $img = $this->imgRepository->update($input, $id);
     
        Flash::success('Img updated successfully.');
        return redirect(route('imgs.getTextImg',$img['our_id']));

    }

    /**
     * Remove the specified Img from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $img = $this->imgRepository->find($id);
        //dd($id);
        if (empty($img)) {
            Flash::error('Img not found');

            return redirect(route('imgs.index'));
        }
        $filePath = 'img/nosotrosdetalles/';
        $this->deleteImg($filePath,$img);
        $this->imgRepository->delete($id);

        Flash::success('Img deleted successfully.');
        
        return redirect(route('imgs.getTextImg',$img['our_id']));

         
    }
}
