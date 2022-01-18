<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTakeAxxionRequest;
use App\Http\Requests\UpdateTakeAxxionRequest;
use App\Repositories\TakeAxxionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\MakeImg;
use App\Models\TakeAxxion;
use DB;
use Carbon\Carbon;



class TakeAxxionController extends AppBaseController
{
    /** @var  TakeAxxionRepository */
    private $takeAxxionRepository;
    use MakeImg;

    public function __construct(TakeAxxionRepository $takeAxxionRepo)
    {
        $this->takeAxxionRepository = $takeAxxionRepo;
    }

    /**
     * Display a listing of the TakeAxxion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $takeAxxions = $this->takeAxxionRepository->all();
        $TakeAxxionIndex = $this->takeAxxionRepository->getTakeAxxionIndex();
        return view('take_axxions.index')
            ->with('takeAxxions', $TakeAxxionIndex);
    }

    /**
     * Show the form for creating a new TakeAxxion.
     *
     * @return Response
     */
    public function create()
    {
      
        $levels = $this->takeAxxionRepository->getEnums('take_axxions','level');
        $categories = $this->takeAxxionRepository->getCategories();
        $users = $this->takeAxxionRepository->getUsers();

        return view('take_axxions.create',compact('levels','categories','users'));

    }

    /**
     * Store a newly created TakeAxxion in storage.
     *
     * @param CreateTakeAxxionRequest $request
     *
     * @return Response
     */
    public function store(CreateTakeAxxionRequest $request)
    {
        $input = $request->all();

        $file_1 = 'img';
        //$file_2 = 'img_2';
        if ($request->hasFile($file_1)) {
          $filePath = 'img/takeaxxion/';         
          $input = $this->makeFile($request,$filePath,$file_1);
        }
         
        $takeAxxion = $this->takeAxxionRepository->create($input);

        Flash::success('registro guardado con éxito.');
        return redirect(route('takeAxxions.index'));
    }

    /**
     * Display the specified TakeAxxion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$takeAxxion = $this->takeAxxionRepository->find($id);
        $takeAxxion = $this->takeAxxionRepository->getTakeAxxion($id);

        if (empty($takeAxxion)) {
            Flash::error('Take Axxion not found');

            return redirect(route('takeAxxions.index'));
        }

        return view('take_axxions.show')->with('takeAxxion', $takeAxxion);
    }

    /**
     * Show the form for editing the specified TakeAxxion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $takeAxxion = $this->takeAxxionRepository->find($id);
        if (empty($takeAxxion)) {
            Flash::error('Take Axxion not found');

            return redirect(route('takeAxxions.index'));
        }
        $levels = $this->takeAxxionRepository->getEnums('take_axxions','level');
        $categories = $this->takeAxxionRepository->getCategories();
        $users = $this->takeAxxionRepository->getUsers();
        //dd($users);

        return view('take_axxions.edit',compact('takeAxxion','levels','categories','users'));
    }

    /**
     * Update the specified TakeAxxion in storage.
     *
     * @param int $id
     * @param UpdateTakeAxxionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTakeAxxionRequest $request)
    {
        $takeAxxion = $this->takeAxxionRepository->find($id);
        $input = $request->all();
        if (empty($takeAxxion)) {
            Flash::error('Take Axxion not found');

            return redirect(route('takeAxxions.index'));
        }
        $file_1 = 'img';
        if ($request->hasFile($file_1)) {
          $filePath = 'img/takeaxxion/';   
          $input = $this->updateFile($request,$filePath,$takeAxxion,$file_1);
        }
         
        $takeAxxion = $this->takeAxxionRepository->update($input, $id);

        Flash::success('registro actualizado con éxito.');

        return redirect(route('takeAxxions.index'));
    }

    /**
     * Remove the specified TakeAxxion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $takeAxxion = $this->takeAxxionRepository->find($id);

        if (empty($takeAxxion)) {
            Flash::error('Take Axxion not found');

            return redirect(route('takeAxxions.index'));
        }
        $file_1 = 'img_1';
        $file_2 = 'img_2';
        $filePath = 'img/takeaxxion/';
        $this->deleteFile($filePath,$takeAxxion,$file_1);
        $this->deleteFile($filePath,$takeAxxion,$file_2);
        $this->takeAxxionRepository->delete($id);
        Flash::success('registro eliminado con exito.');

        return redirect(route('takeAxxions.index'));
    }

    //public function storeImgwww(Request $request)
    //{
      //$namefield = 'upload';
      //$filePath = 'img/takeaxxionwww/';         
      //$result = $this->makeFile($request,$filePath,$namefield);

      //$task = new TakeAxxion();
      //$task->id = 0;
      //$task->exists = true;
      //$images = $task->addMediaFromRequest('upload')->toMediaCollection('images');

      //return response()->json(
        //['url'=> url('/storage/'.$images->order_column.'/'.$images->file_name) 
      //]);

    //}
    public function storeImg(Request $request)
    {
 
      $namefield = 'upload';
      $filePath = 'img/takeaxxion/';         
      $result = $this->makeFile($request,$filePath,$namefield);
      return response()->json(
        ['url'=> url('/storage/'.$result[$namefield])
      ]);

    }

}
