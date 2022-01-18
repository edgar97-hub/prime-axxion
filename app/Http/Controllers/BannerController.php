<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Repositories\BannerRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Repositories\MakeImg;

class BannerController extends AppBaseController
{
    /** @var  BannerRepository */
    private $BannerRepository;
    use MakeImg;
    public function __construct(BannerRepository $BannerRepository)
    {
        $this->BannerRepository = $BannerRepository;
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
        $Banners = $this->BannerRepository->all();

        return view('banners.index')
            ->with('banners', $Banners);
    }

    /**
     * Show the form for creating a new CalltoAction.
     *
     * @return Response
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created CalltoAction in storage.
     *
     * @param CreateCalltoActionRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerRequest $request)
    {
        $input = $request->all();
        $file_1 = 'img';
        if ($request->hasFile('img')) {
          $filePath = 'img/banner/';
           //$input = $this->makeImg($request,$filePath);
           $input = $this->makeFile($request,$filePath,$file_1);

        }
        Flash::success('Guardado con éxito.');
        
        $this->BannerRepository->create($input);
     
        return redirect(route('banners.index'));
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
        $banner = $this->BannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('Registro no encontrado');

            return redirect(route('banners.index'));
        }

        return view('banners.show')->with('banner', $banner);
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
        $banner = $this->BannerRepository->find($id);

        if (empty($banner)) {
            Flash::error('Registro no encontrado');

            return redirect(route('banners.index'));
        }

        return view('banners.edit')->with('banner', $banner);
    }

    /**
     * Update the specified CalltoAction in storage.
     *
     * @param int $id
     * @param UpdateCalltoActionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerRequest $request)
    {
        $banner = $this->BannerRepository->find($id);
        $input = $request->all();
        $file_1 = 'img';
        if (empty($banner)) {
            Flash::error('Registro no encontrado');

            return redirect(route('banners.index'));
        }
        if ($request->hasFile('img')) {
          $filePath = 'img/banner/';
          $input = $this->updateFile($request,$filePath,$banner,$file_1);
          //$input = $this->updateImg($request,$filePath,$banner);
        }
        $this->BannerRepository->update($input, $id);
        Flash::success('actualizado con éxito.');

        return redirect(route('banners.index'));
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
        $banner = $this->BannerRepository->find($id);
        $file_2 = 'img';
        if (empty($banner)) {
            Flash::error('Registro no encontrado');

            return redirect(route('banners.index'));
        }
     
        $filePath = 'img/banner/';
        //$this->deleteImg($filePath,$banner);
        $this->deleteFile($filePath,$banner,$file_2);

        $this->BannerRepository->delete($id);

        Flash::success('eliminado con éxito.');

        return redirect(route('banners.index'));
    }
}
