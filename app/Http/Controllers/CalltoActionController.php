<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCalltoActionRequest;
use App\Http\Requests\UpdateCalltoActionRequest;
use App\Repositories\CalltoActionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\MakeImg;

class CalltoActionController extends AppBaseController
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
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $calltoActions = $this->calltoActionRepository->all();

        return view('callto_actions.index')
            ->with('calltoActions', $calltoActions);
    }

    /**
     * Show the form for creating a new CalltoAction.
     *
     * @return Response
     */
    public function create()
    {
        return view('callto_actions.create');
    }

    /**
     * Store a newly created CalltoAction in storage.
     *
     * @param CreateCalltoActionRequest $request
     *
     * @return Response
     */
    public function store(CreateCalltoActionRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
          $filePath = 'img/callAction/';
           $input = $this->makeImg($request,$filePath);
        }
        Flash::success('Callto Action saved successfullsssy.');
        
        $calltoAction = $this->calltoActionRepository->create($input);
     
        return redirect(route('calltoActions.index'));
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
        $calltoAction = $this->calltoActionRepository->find($id);

        if (empty($calltoAction)) {
            Flash::error('Callto Action not found');

            return redirect(route('calltoActions.index'));
        }

        return view('callto_actions.show')->with('calltoAction', $calltoAction);
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
        $calltoAction = $this->calltoActionRepository->find($id);

        if (empty($calltoAction)) {
            Flash::error('Callto Action not found');

            return redirect(route('calltoActions.index'));
        }

        return view('callto_actions.edit')->with('calltoAction', $calltoAction);
    }

    /**
     * Update the specified CalltoAction in storage.
     *
     * @param int $id
     * @param UpdateCalltoActionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCalltoActionRequest $request)
    {
        $calltoAction = $this->calltoActionRepository->find($id);
        $input = $request->all();

        if (empty($calltoAction)) {
            Flash::error('Callto Action not found');

            return redirect(route('calltoActions.index'));
        }
        if ($request->hasFile('img')) {
          $filePath = 'img/callAction/';
          $input = $this->updateImg($request,$filePath,$calltoAction);
        }
        //$calltoAction = $this->calltoActionRepository->update($request->all(), $id);
        $calltoAction = $this->calltoActionRepository->update($input, $id);


        Flash::success('Callto Action updated successfully.');

        return redirect(route('calltoActions.index'));
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
        $calltoAction = $this->calltoActionRepository->find($id);

        if (empty($calltoAction)) {
            Flash::error('Callto Action not found');

            return redirect(route('calltoActions.index'));
        }
     
        $filePath = 'img/callAction/';
        $this->deleteImg($filePath,$calltoAction);
        
        $this->calltoActionRepository->delete($id);

        Flash::success('Callto Action deleted successfully.');

        return redirect(route('calltoActions.index'));
    }
}
