<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNosotrosdetalleAPIRequest;
use App\Http\Requests\API\UpdateNosotrosdetalleAPIRequest;
use App\Models\Nosotrosdetalle;
use App\Repositories\NosotrosdetalleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Repositories\MakeImg;

/**
 * Class NosotrosdetalleController
 * @package App\Http\Controllers\API
 */

class NosotrosdetalleAPIController extends AppBaseController
{
    /** @var  NosotrosdetalleRepository */
    private $nosotrosdetalleRepository;

    use MakeImg;
    public function __construct(NosotrosdetalleRepository $nosotrosdetalleRepo)
    {
        $this->nosotrosdetalleRepository = $nosotrosdetalleRepo;
    }

    /**
     * Display a listing of the Nosotrosdetalle.
     * GET|HEAD /nosotrosdetalles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $nosotrosdetalles = $this->nosotrosdetalleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($nosotrosdetalles->toArray(), 'Nosotrosdetalles retrieved successfully');
    }

    /**
     * Store a newly created Nosotrosdetalle in storage.
     * POST /nosotrosdetalles
     *
     * @param CreateNosotrosdetalleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNosotrosdetalleAPIRequest $request)
    {
        //$input = $request->all();
        //$nosotrosdetalle = $this->nosotrosdetalleRepository->create($input);
        $nosotrosdetalle = $this->nosotrosdetalleRepository->createUs($request);
        $nosotrosdetalle['img'] = url('/storage/'.$nosotrosdetalle['img']);

        return $this->sendResponse($nosotrosdetalle->toArray(), 'Nosotrosdetalle saved successfully');
    }

    /**
     * Display the specified Nosotrosdetalle.
     * GET|HEAD /nosotrosdetalles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Nosotrosdetalle $nosotrosdetalle */
        $nosotrosdetalle = $this->nosotrosdetalleRepository->find($id);

        if (empty($nosotrosdetalle)) {
            return $this->sendError('Nosotrosdetalle not found');
        }

        return $this->sendResponse($nosotrosdetalle->toArray(), 'Nosotrosdetalle retrieved successfully');
    }

    /**
     * Update the specified Nosotrosdetalle in storage.
     * PUT/PATCH /nosotrosdetalles/{id}
     *
     * @param int $id
     * @param UpdateNosotrosdetalleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNosotrosdetalleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Nosotrosdetalle $nosotrosdetalle */
        $nosotrosdetalle = $this->nosotrosdetalleRepository->find($id);

        if (empty($nosotrosdetalle)) {
            return $this->sendError('Nosotrosdetalle not found');
        }

        //$nosotrosdetalle = $this->nosotrosdetalleRepository->update($input, $id);
        $nosotrosdetalle = $this->nosotrosdetalleRepository->updateUs($id,$request);
        $nosotrosdetalle['img'] = url('/storage/'.$nosotrosdetalle['img']);


        return $this->sendResponse($nosotrosdetalle, 'Nosotrosdetalle updated successfully');
    }

    /**
     * Remove the specified Nosotrosdetalle from storage.
     * DELETE /nosotrosdetalles/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function delete($id)
    {
        /** @var Nosotrosdetalle $nosotrosdetalle */
        $nosotrosdetalle = $this->nosotrosdetalleRepository->find($id);

        if (empty($nosotrosdetalle)) {
            return $this->sendError('Nosotrosdetalle not found');
        }
        $filePath = 'img/nosotrosdetalles/';
        $this->deleteImg($filePath,$nosotrosdetalle);
        $nosotrosdetalle->delete();

        return $this->sendSuccess('Nosotrosdetalle deleted successfully');
    }
}
