<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCalltoActionAPIRequest;
use App\Http\Requests\API\UpdateCalltoActionAPIRequest;
use App\Models\CalltoAction;
use App\Repositories\CalltoActionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Repositories\MakeImg;
/**
 * Class CalltoActionController
 * @package App\Http\Controllers\API
 */

class CalltoActionAPIController extends AppBaseController
{
    /** @var  CalltoActionRepository */
    private $calltoActionRepository;
    use MakeImg;
    public function __construct(CalltoActionRepository $calltoActionRepo)
    {
        $this->calltoActionRepository = $calltoActionRepo;
    }

    /**
     * Display a listing of the CalltoAction.
     * GET|HEAD /calltoActions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $calltoActions = $this->calltoActionRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        foreach ($calltoActions as $value) 
        {
          $value['img'] = url('/storage/'.$value['img']);

        }
 
        return $this->sendResponse($calltoActions->toArray(), 'Callto Actions retrieved successfully');
    }

    /**
     * Store a newly created CalltoAction in storage.
     * POST /calltoActions
     *
     * @param CreateCalltoActionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCalltoActionAPIRequest $request)
    {
        //$input = $request->all();
        //$calltoAction = $this->calltoActionRepository->create($input);
        $calltoAction = $this->calltoActionRepository->createCallActionRepository($request);

        $calltoAction['img'] = url('/storage/'.$calltoAction['img']);

        return $this->sendResponse($calltoAction->toArray(), 'Callto Action saved successfully');
    }

    /**
     * Display the specified CalltoAction.
     * GET|HEAD /calltoActions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CalltoAction $calltoAction */
        $calltoAction = $this->calltoActionRepository->find($id);

        if (empty($calltoAction)) {
            return $this->sendError('Callto Action not found');
        }
        $calltoAction['img'] = url('/storage/'.$calltoAction['img']);

        return $this->sendResponse($calltoAction->toArray(), 'Callto Action retrieved successfully');
    }

    /**
     * Update the specified CalltoAction in storage.
     * PUT/PATCH /calltoActions/{id}
     *
     * @param int $id
     * @param UpdateCalltoActionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCalltoActionAPIRequest $request)
    {
        $input = $request->all();

        /** @var CalltoAction $calltoAction */
        $calltoAction = $this->calltoActionRepository->find($id);

        if (empty($calltoAction)) {
            return $this->sendError('Callto Action not found');
        }

        //$calltoAction = $this->calltoActionRepository->update($input, $id);
        $calltoAction = $this->calltoActionRepository->updateCallActionRepository($id,$request);
        $calltoAction['img'] = url('/storage/'.$calltoAction['img']);

        return $this->sendResponse($calltoAction->toArray(), 'CalltoAction updated successfully');
    }

    /**
     * Remove the specified CalltoAction from storage.
     * DELETE /calltoActions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function delete($id)
    {
        /** @var CalltoAction $calltoAction */
        $calltoAction = $this->calltoActionRepository->find($id);

        if (empty($calltoAction)) {
            return $this->sendError('Callto Action not found');
        }
        $filePath = 'img/callAction/';
        $this->deleteImg($filePath,$calltoAction);
        $calltoAction->delete();

        return $this->sendSuccess('Callto Action deleted successfully');
    }
}
