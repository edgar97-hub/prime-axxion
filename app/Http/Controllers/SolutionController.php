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
    public function getView($viewseccion)
    {
      $solutions = $this->SolutionRepository->all();
      //dd($solutions[2]->title);
      //$titulo;
     // foreach( $solutions as $value) {
       // if(is_null($value['title']))
        //{
          //echo $value['title'], "\n";

        //}
      //}
      if($viewseccion == 1)
      {
        
        return view('solutions.title.index')
        ->with('solutions', $solutions)->with('viewseccion', $viewseccion);
       
      }
      if($viewseccion == 2)
      {
        return view('solutions.cards.index')
        ->with('solutions', $solutions)->with('viewseccion', $viewseccion);
      }
      
    }
    /**
     * Show the form for creating a new CalltoAction.
     *
     * @return Response
     */
    public function createCard($viewseccion)
    {
        
        if($viewseccion == 1)
        {
          return view('solutions.title.create');
          
        }
        if($viewseccion == 2)
        {
          return view('solutions.cards.create');
        }
    }
    public function create()
    {
        return view('solutions.create');
    }
    public function storeCard(CreateSolutionRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
          $filePath = 'img/solution/';
           $input = $this->makeImg($request,$filePath);
        }
        Flash::success('Guardado con éxito.');
        
        $this->SolutionRepository->create($input);
     
        return redirect(route('solutions.getView',2));
      }
    public function store(CreateSolutionRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('img')) {
          $filePath = 'img/solution/';
           $input = $this->makeImg($request,$filePath);
        }
        Flash::success('Guardado con éxito.');
        
        $this->SolutionRepository->create($input);
     
        return redirect(route('solutions.getView',1));
    }

    /**
     * Display the specified CalltoAction.
     *
     * @param int $id
     *
     * @return Response
     */
    
    public function showCard($id)
    {
        $solution = $this->SolutionRepository->find($id);

        if (empty($solution)) 
        {
            Flash::error('Registro no encontrado');

            return redirect(route('solutions.getView',2));

        }
    
         return view('solutions.cards.show')->with('solution', $solution);

        

    } 
    public function show($id)
    {
        $solution = $this->SolutionRepository->find($id);

        if (empty($solution)) 
        {
            Flash::error('Registro no encontrado');

            return redirect(route('solutions.getView',1));

        }
        return view('solutions.title.show')->with('solution', $solution);

         

    }

    /**
     * Show the form for editing the specified CalltoAction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function editCard($id)
    {
        $solution = $this->SolutionRepository->find($id);

        if (empty($solution)) {
            Flash::error('Registro no encontrado');

            return redirect(route('solutions.getView',2));
        }
        return view('solutions.cards.edit')->with('solution', $solution);

    }
    public function edit($id)
    {
        $solution = $this->SolutionRepository->find($id);

        if (empty($solution)) {
            Flash::error('Registro no encontrado');

            return redirect(route('solutions.getView',1));
        }

        return view('solutions.title.edit')->with('solution', $solution);
    }

    /**
     * Update the specified CalltoAction in storage.
     *
     * @param int $id
     * @param UpdateCalltoActionRequest $request
     *
     * @return Response
     */
    public function updateCard($id, UpdateSolutionRequest $request)
    {
        $solution = $this->SolutionRepository->find($id);
        $input = $request->all();

        if (empty($solution)) {
            Flash::error('Registro no encontrado');

            return redirect(route('solutions.getView',2));
        }
        if ($request->hasFile('img')) {
          $filePath = 'img/solution/';
          $input = $this->updateImg($request,$filePath,$solution);
        }
        $this->SolutionRepository->update($input, $id);
        Flash::success('actualizado con éxito.');

        return redirect(route('solutions.getView',2));
    }

    public function update($id, UpdateSolutionRequest $request)
    {
        $solution = $this->SolutionRepository->find($id);
        $input = $request->all();

        if (empty($solution)) {
            Flash::error('Registro no encontrado');

            return redirect(route('solutions.getView',1));
          }
        if ($request->hasFile('img')) {
          $filePath = 'img/solution/';
          $input = $this->updateImg($request,$filePath,$solution);
        }
        $this->SolutionRepository->update($input, $id);
        Flash::success('actualizado con éxito.');

        return redirect(route('solutions.getView',1));
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
    public function destroyCard($id)
    {
     
        $solution = $this->SolutionRepository->find($id);

        if (empty($solution)) {
            Flash::error('Registro no encontrado');

            return redirect(route('solutions.index'));
        }
     
        $filePath = 'img/solution/';
        $this->deleteImg($filePath,$solution);
        
        $this->SolutionRepository->delete($id);

        Flash::success('eliminado con éxito.');
        return redirect(route('solutions.getView',2));

    }
    public function destroy($id)
    {
     
        $solution = $this->SolutionRepository->find($id);

        if (empty($solution)) {
            Flash::error('Registro no encontrado');

            return redirect(route('solutions.index'));
        }
     
        $filePath = 'img/solution/';
        $this->deleteImg($filePath,$solution);
        
        $this->SolutionRepository->delete($id);

        Flash::success('eliminado con éxito.');
        return redirect(route('solutions.getView',1));

    }
}
