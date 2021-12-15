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

        return view('take_axxions.index')
            ->with('takeAxxions', $takeAxxions);
    }

    /**
     * Show the form for creating a new TakeAxxion.
     *
     * @return Response
     */
    public function create()
    {
        return view('take_axxions.create');
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

        if ($request->hasFile('img')) {
          $filePath = 'img/takeaxxion/';
           $input = $this->makeImg($request,$filePath);
        }

        $takeAxxion = $this->takeAxxionRepository->create($input);

        Flash::success('Guardado con éxito.');

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
        $takeAxxion = $this->takeAxxionRepository->find($id);

        if (empty($takeAxxion)) {
            Flash::error('Registro no encontrado');

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
            Flash::error('Registro no encontrado');

            return redirect(route('takeAxxions.index'));
        }

        return view('take_axxions.edit')->with('takeAxxion', $takeAxxion);
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
            Flash::error('Registro no encontrado');

            return redirect(route('takeAxxions.index'));
        }
        if ($request->hasFile('img')) {
          $filePath = 'img/takeaxxion/';
          $input = $this->updateImg($request,$filePath,$takeAxxion);
        }
        $takeAxxion = $this->takeAxxionRepository->update($input, $id);

        Flash::success('actualizado con éxito.');

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
            Flash::error('Registro no encontrado');

            return redirect(route('takeAxxions.index'));
        }

        $this->deleteImg(null,$takeAxxion);
        
        $this->takeAxxionRepository->delete($id);

        Flash::success('eliminado con éxito.');

        return redirect(route('takeAxxions.index'));
    }
}
