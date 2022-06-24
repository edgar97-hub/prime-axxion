<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAyudaAPIRequest;
use App\Http\Requests\API\UpdateAyudaAPIRequest;
use App\Models\Ayuda;
use App\Repositories\AyudaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\Help\HelpCollection;
use Response;

/**
 * Class AyudaController
 * @package App\Http\Controllers\API
 */

class AyudaAPIController extends AppBaseController
{
    /** @var  AyudaRepository */
    private $ayudaRepository;

    public function __construct(AyudaRepository $ayudaRepo)
    {
        $this->ayudaRepository = $ayudaRepo;
    }

    /**
     * Display a listing of the Ayuda.
     * GET|HEAD /ayudas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ayudas = Ayuda::orderBy('created_at','desc')->paginate(20);

        return $this->sendResponse( new HelpCollection($ayudas), 'Lista de ayuda');
    }

    /**
     * Store a newly created Ayuda in storage.
     * POST /ayudas
     *
     * @param CreateAyudaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAyudaAPIRequest $request)
    {
        $input = $request->all();

        $ayuda = $this->ayudaRepository->create($input);

        return $this->sendResponse($ayuda->toArray(), 'Ayuda saved successfully');
    }

    /**
     * Display the specified Ayuda.
     * GET|HEAD /ayudas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Ayuda $ayuda */
        $ayuda = $this->ayudaRepository->find($id);

        if (empty($ayuda)) {
            return $this->sendError('Ayuda not found');
        }

        return $this->sendResponse($ayuda->toArray(), 'Ayuda retrieved successfully');
    }

    /**
     * Update the specified Ayuda in storage.
     * PUT/PATCH /ayudas/{id}
     *
     * @param int $id
     * @param UpdateAyudaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAyudaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Ayuda $ayuda */
        $ayuda = $this->ayudaRepository->find($id);

        if (empty($ayuda)) {
            return $this->sendError('Ayuda not found');
        }

        $ayuda = $this->ayudaRepository->update($input, $id);

        return $this->sendResponse($ayuda->toArray(), 'Ayuda updated successfully');
    }

    /**
     * Remove the specified Ayuda from storage.
     * DELETE /ayudas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function delete($id)
    {
        /** @var Ayuda $ayuda */
        $ayuda = $this->ayudaRepository->find($id);

        if (empty($ayuda)) {
            return $this->sendError('Ayuda not found');
        }

        $ayuda->delete();

        return $this->sendSuccess('Ayuda deleted successfully');
    }
}
