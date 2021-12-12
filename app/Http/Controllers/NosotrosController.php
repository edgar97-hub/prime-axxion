<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNosotrosRequest;
use App\Http\Requests\UpdateNosotrosRequest;
use App\Repositories\NosotrosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\MakeImg;

class NosotrosController extends AppBaseController
{
    /** @var  NosotrosRepository */
    private $NosotrosRepository;
    use MakeImg;
    public function __construct(NosotrosRepository $NosotrosRepository)
    {
        $this->NosotrosRepository = $NosotrosRepository;
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
        $nosotros = $this->NosotrosRepository->all();

        return view('nosotros.index')
            ->with('nosotros', $nosotros);
    }

    /**
     * Show the form for creating a new CalltoAction.
     *
     * @return Response
     */
    public function create()
    {
        return view('nosotros.create');
    }

    /**
     * Store a newly created CalltoAction in storage.
     *
     * @param CreateCalltoActionRequest $request
     *
     * @return Response
     */
    public function store(CreateNosotrosRequest $request)
    {
        $input = $request->all();
 
        Flash::success('Guardado con éxito');
        
        $this->NosotrosRepository->create($input);
     
        return redirect(route('nosotros.index'));
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
        $nosotros = $this->NosotrosRepository->find($id);

        if (empty($nosotros)) {
            Flash::error('Registro no encontrado');

            return redirect(route('nosotros.index'));
        }

        return view('nosotros.show')->with('nosotros', $nosotros);
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
        $nosotros = $this->NosotrosRepository->find($id);

        if (empty($nosotros)) {
            Flash::error('Registro no encontrado');

            return redirect(route('nosotros.index'));
        }

        return view('nosotros.edit')->with('nosotros', $nosotros);
    }

    /**
     * Update the specified CalltoAction in storage.
     *
     * @param int $id
     * @param UpdateCalltoActionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNosotrosRequest $request)
    {
        $nosotros = $this->NosotrosRepository->find($id);
        $input = $request->all();

        if (empty($nosotros)) {
            Flash::error('Registro no encontrado');

            return redirect(route('nosotros.index'));
        }
         
        $this->NosotrosRepository->update($input, $id);
        Flash::success('actualizado con éxito.');

        return redirect(route('nosotros.index'));
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
        $nosotros = $this->NosotrosRepository->find($id);

        if (empty($nosotros)) {
            Flash::error('Registro no encontrado');

            return redirect(route('nosotros.index'));
        }
     
        
        $this->NosotrosRepository->delete($id);

        Flash::success('eliminando con éxito.');

        return redirect(route('nosotros.index'));
    }
    public function searchSection(Request $request, $vendor)
    {
        $output = $this->NosotrosRepository->searchSection($request, $vendor);
        return $output;
        
    }
}
