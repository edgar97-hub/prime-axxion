<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAyudaRequest;
use App\Http\Requests\UpdateAyudaRequest;
use App\Repositories\AyudaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class AyudaController extends AppBaseController
{
    /** @var  AyudaRepository */
    private $ayudaRepository;

    public function __construct(AyudaRepository $ayudaRepo)
    {
        $this->ayudaRepository = $ayudaRepo;
    }

    /**
     * Display a listing of the Ayuda.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $ayudas = $this->ayudaRepository->all();

        return view('ayudas.index')
            ->with('ayudas', $ayudas);
    }

    /**
     * Show the form for creating a new Ayuda.
     *
     * @return Response
     */
    public function create()
    {
        return view('ayudas.create');
    }

    /**
     * Store a newly created Ayuda in storage.
     *
     * @param CreateAyudaRequest $request
     *
     * @return Response
     */
    public function store(CreateAyudaRequest $request)
    {
        $input = $request->all();

        $ayuda = $this->ayudaRepository->create($input);

        Flash::success('Guardado con éxito.');

        return redirect(route('ayudas.index'));
    }

    /**
     * Display the specified Ayuda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ayuda = $this->ayudaRepository->find($id);

        if (empty($ayuda)) {
            Flash::error('Registro no encontrado');

            return redirect(route('ayudas.index'));
        }

        return view('ayudas.show')->with('ayuda', $ayuda);
    }

    /**
     * Show the form for editing the specified Ayuda.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ayuda = $this->ayudaRepository->find($id);

        if (empty($ayuda)) {
            Flash::error('Registro no encontrado');

            return redirect(route('ayudas.index'));
        }

        return view('ayudas.edit')->with('ayuda', $ayuda);
    }

    /**
     * Update the specified Ayuda in storage.
     *
     * @param int $id
     * @param UpdateAyudaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAyudaRequest $request)
    {
        $ayuda = $this->ayudaRepository->find($id);

        if (empty($ayuda)) {
            Flash::error('Registro no encontrado');

            return redirect(route('ayudas.index'));
        }

        $ayuda = $this->ayudaRepository->update($request->all(), $id);

        Flash::success('actualizado con éxito.');

        return redirect(route('ayudas.index'));
    }

    /**
     * Remove the specified Ayuda from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ayuda = $this->ayudaRepository->find($id);

        if (empty($ayuda)) {
            Flash::error('Registro no encontrado');

            return redirect(route('ayudas.index'));
        }

        $this->ayudaRepository->delete($id);

        Flash::success('eliminado con éxito.');

        return redirect(route('ayudas.index'));
    }
}
