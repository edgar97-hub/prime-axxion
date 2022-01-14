<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTakeAxxionAPIRequest;
use App\Http\Requests\API\UpdateTakeAxxionAPIRequest;
use App\Models\TakeAxxion;
use App\Repositories\TakeAxxionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TakeAxxionController
 * @package App\Http\Controllers\API
 */

class TakeAxxionAPIController extends AppBaseController
{
    /** @var  TakeAxxionRepository */
    private $takeAxxionRepository;

    public function __construct(TakeAxxionRepository $takeAxxionRepo)
    {
        $this->takeAxxionRepository = $takeAxxionRepo;
    }

    /**
     * Display a listing of the TakeAxxion.
     * GET|HEAD /takeAxxions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $takeAxxions = $this->takeAxxionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($takeAxxions->toArray(), 'Take Axxions retrieved successfully');
    }

    /**
     * Store a newly created TakeAxxion in storage.
     * POST /takeAxxions
     *
     * @param CreateTakeAxxionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTakeAxxionAPIRequest $request)
    {
        $input = $request->all();

        $takeAxxion = $this->takeAxxionRepository->create($input);

        return $this->sendResponse($takeAxxion->toArray(), 'Take Axxion saved successfully');
    }

    /**
     * Display the specified TakeAxxion.
     * GET|HEAD /takeAxxions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TakeAxxion $takeAxxion */
        $takeAxxion = $this->takeAxxionRepository->find($id);

        if (empty($takeAxxion)) {
            return $this->sendError('Take Axxion not found');
        }

        return $this->sendResponse($takeAxxion->toArray(), 'Take Axxion retrieved successfully');
    }

    /**
     * Update the specified TakeAxxion in storage.
     * PUT/PATCH /takeAxxions/{id}
     *
     * @param int $id
     * @param UpdateTakeAxxionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTakeAxxionAPIRequest $request)
    {
        $input = $request->all();

        /** @var TakeAxxion $takeAxxion */
        $takeAxxion = $this->takeAxxionRepository->find($id);

        if (empty($takeAxxion)) {
            return $this->sendError('Take Axxion not found');
        }

        $takeAxxion = $this->takeAxxionRepository->update($input, $id);

        return $this->sendResponse($takeAxxion->toArray(), 'TakeAxxion updated successfully');
    }

    /**
     * Remove the specified TakeAxxion from storage.
     * DELETE /takeAxxions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TakeAxxion $takeAxxion */
        $takeAxxion = $this->takeAxxionRepository->find($id);

        if (empty($takeAxxion)) {
            return $this->sendError('Take Axxion not found');
        }

        $takeAxxion->delete();

        return $this->sendSuccess('Take Axxion deleted successfully');
    }
}
