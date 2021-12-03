<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSolutionRequest;
use App\Http\Requests\UpdateSolutionRequest;
use App\Repositories\SolutionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\MakeImg;

class SolutionController extends AppBaseController
{
    
    private $SolutionRepository;
    use MakeImg;
    public function __construct(SolutionRepository $SolutionRepository)
    {
        $this->SolutionRepository = $SolutionRepository;
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
        $solutions = $this->SolutionRepository->all();

        return view('solutions.index')
            ->with('solutions', $solutions);
    }

    /**
     * Show the form for creating a new CalltoAction.
     *
     * @return Response
     */
    public function create()
    {
        return view('solutions.create');
    }

    public function store(CreateSolutionRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
          $filePath = 'img/solution/';
           $input = $this->makeImg($request,$filePath);
        }
        Flash::success('solution saved successfullsssy.');
        
        $this->SolutionRepository->create($input);
     
        return redirect(route('solutions.index'));
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
        $solution = $this->SolutionRepository->find($id);

        if (empty($solution)) {
            Flash::error('Solution not found');

            return redirect(route('banners.index'));
        }

        return view('solutions.show')->with('solution', $solution);
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
        $solution = $this->SolutionRepository->find($id);

        if (empty($solution)) {
            Flash::error('solution not found');

            return redirect(route('solution.index'));
        }

        return view('solutions.edit')->with('solution', $solution);
    }

    /**
     * Update the specified CalltoAction in storage.
     *
     * @param int $id
     * @param UpdateCalltoActionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSolutionRequest $request)
    {
        $solution = $this->SolutionRepository->find($id);
        $input = $request->all();

        if (empty($solution)) {
            Flash::error('solution not found');

            return redirect(route('solutions.index'));
        }
        if ($request->hasFile('img')) {
          $filePath = 'img/solution/';
          $input = $this->updateImg($request,$filePath,$solution);
        }
        $this->SolutionRepository->update($input, $id);
        Flash::success('solution updated successfully.');

        return redirect(route('solutions.index'));
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
        $solution = $this->SolutionRepository->find($id);

        if (empty($solution)) {
            Flash::error('solution not found');

            return redirect(route('solutions.index'));
        }
     
        $filePath = 'img/solution/';
        $this->deleteImg($filePath,$solution);
        
        $this->SolutionRepository->delete($id);

        Flash::success('solution deleted successfully.');

        return redirect(route('solutions.index'));
    }
}
