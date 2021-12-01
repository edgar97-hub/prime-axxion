<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNosotrosAPIRequest;
use App\Http\Requests\API\UpdateNosotrosAPIRequest;
use App\Models\Nosotros;
use App\Models\Nosotrosdetalle;

use App\Repositories\NosotrosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class NosotrosController
 * @package App\Http\Controllers\API
 */

class NosotrosAPIController extends AppBaseController
{
    /** @var  NosotrosRepository */
    private $nosotrosRepository;

    public function __construct(NosotrosRepository $nosotrosRepo)
    {
        $this->nosotrosRepository = $nosotrosRepo;
    }

    /**
     * Display a listing of the Nosotros.
     * GET|HEAD /nosotros
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $nosotros = $this->nosotrosRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        $nosotrosDetails = $this->nosotrosRepository->getDetails($nosotros);
        return $this->sendResponse($nosotrosDetails, 'Nosotros retrieved successfully');
    }

    /**
     * Store a newly created Nosotros in storage.
     * POST /nosotros
     *
     * @param CreateNosotrosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNosotrosAPIRequest $request)
    {
        $input = $request->all();

        $nosotros = $this->nosotrosRepository->create($input);

        return $this->sendResponse($nosotros->toArray(), 'Nosotros saved successfully');
    }

    /**
     * Display the specified Nosotros.
     * GET|HEAD /nosotros/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Nosotros $nosotros */
        $nosotros = $this->nosotrosRepository->find($id);
         
        if (empty($nosotros)) {
            return $this->sendError('Nosotros not found');
        }

        $nosotrosDetails = $this->nosotrosRepository->getNosotros($nosotros);
        return $this->sendResponse($nosotrosDetails, 'Nosotros retrieved successfully');
    }

    /**
     * Update the specified Nosotros in storage.
     * PUT/PATCH /nosotros/{id}
     *
     * @param int $id
     * @param UpdateNosotrosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNosotrosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Nosotros $nosotros */
        $nosotros = $this->nosotrosRepository->find($id);

        if (empty($nosotros)) {
            return $this->sendError('Nosotros not found');
        }

        $nosotros = $this->nosotrosRepository->update($input, $id);

        return $this->sendResponse($nosotros->toArray(), 'Nosotros updated successfully');
    }

    /**
     * Remove the specified Nosotros from storage.
     * DELETE /nosotros/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function delete($id)
    {
        /** @var Nosotros $nosotros */
        $nosotros = $this->nosotrosRepository->find($id);

        if (empty($nosotros)) {
            return $this->sendError('Nosotros not found');
        }

        $nosotros->delete();

        return $this->sendSuccess('Nosotros deleted successfully');
    }
}
