<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSolutionAPIRequest;
use App\Http\Requests\API\UpdateSolutionAPIRequest;
use App\Models\Solution;
use App\Repositories\SolutionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Repositories\MakeImg;
use DB;
/**
 * Class SolutionController
 * @package App\Http\Controllers\API
 */

class SolutionAPIController extends AppBaseController
{
    /** @var  SolutionRepository */
    private $solutionRepository;
    use MakeImg;
    public function __construct(SolutionRepository $solutionRepo)
    {
        $this->solutionRepository = $solutionRepo;
    }

    /**
     * Display a listing of the Solution.
     * GET|HEAD /solutions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $data = DB::select('select titulolight, titulonegrita, img from solutions WHERE title IS  NULL ');

        if(!count($data) == 0)
        {
          $solutions = $this->solutionRepository->all(
          $request->except(['skip', 'limit']),
          $request->get('skip'),
          $request->get('limit')
          )->first()->whereNotNull('title')->get();
          foreach ($data as $value) 
          {
            $value->img = url('/storage/'.$value->img);
          }
          if(!count($solutions) == 0)
          {
           $data['title'] = $solutions[0]->title;
          }
        }
       

         
        
        return $this->sendResponse($data, 'Solutions retrieved successfully');
    }

    /**
     * Store a newly created Solution in storage.
     * POST /solutions
     *
     * @param CreateSolutionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSolutionAPIRequest $request)
    {


      $solution = $this->solutionRepository->createT($request);
      $solution['img'] = url('/storage/'.$solution['img']);

        return $this->sendResponse($solution->toArray(), 'Solution saved successfully');
    }

    /**
     * Display the specified Solution.
     * GET|HEAD /solutions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Solution $solution */
        $solution = $this->solutionRepository->find($id);

        if (empty($solution)) {
            return $this->sendError('Solution not found');
        }
        $solution['img'] = url('/storage/'.$solution['img']);

        return $this->sendResponse($solution->toArray(), 'Solution retrieved successfully');
    }

    /**
     * Update the specified Solution in storage.
     * PUT/PATCH /solutions/{id}
     *
     * @param int $id
     * @param UpdateSolutionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSolutionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Solution $solution */
        $solution = $this->solutionRepository->find($id);

        if (empty($solution)) {
            return $this->sendError('Solution not found');
        }
       
       

        //$solution = $this->solutionRepository->update($input, $id);
        $solution = $this->solutionRepository->updateT($id,$request);
        $solution['img'] = url('/storage/'.$solution['img']);

        return $this->sendResponse($solution->toArray(), 'Solution updated successfully');
    }

    /**
     * Remove the specified Solution from storage.
     * DELETE /solutions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function delete($id)
    {
        /** @var Solution $solution */
        $solution = $this->solutionRepository->find($id);

        if (empty($solution)) {
            return $this->sendError('Solution not found');
        }

        $filePath = 'img/solution/';
        $this->deleteImg($filePath,$solution);
        $solution->delete();

        return $this->sendSuccess('Solution deleted successfully');
    }
}
