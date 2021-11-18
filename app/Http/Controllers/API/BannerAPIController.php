<?php

namespace App\Http\Controllers\API;
 
use App\Http\Requests\API\CreateBannerAPIRequest;
use App\Http\Requests\API\UpdateBannerAPIRequest;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class BannerAPIController extends AppBaseController
{
    /** @var  UserRepository */
    private $bannerRepository;

    public function __construct(BannerRepository $bannerRepo)
    {
        $this->bannerRepository = $bannerRepo;
    }

    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $banner = $this->bannerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );
        foreach ($banner as $value) 
        {
          $value['img'] = url('/'.$value['img']);

        }
 
        return $this->sendResponse($banner->toArray(), 'banner retrieved successfully');
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @param CreateUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateBannerAPIRequest $request)
    {

        $banner = $this->bannerRepository->createBanner($request);
        $banner['img'] = url('/'.$banner['img']);

        return $this->sendResponse($banner->toArray(), 'banner saved successfully');
    }

    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            return $this->sendError('banner not found');
        }

        return $this->sendResponse($banner->toArray(), 'banner retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/{id}
     *
     * @param int $id
     * @param UpdateUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBannerAPIRequest $request)
    {
        $input = $request->all();

        /** @var User $user */
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            return $this->sendError('banner not found');
        }

        //$banner = $this->bannerRepository->update($input, $id);
        $banner = $this->bannerRepository->updateBanner($id,$request);
        $banner['img'] = url('/'.$banner['img']);


        return $this->sendResponse($banner->toArray(), 'banner updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function delete($id)
    {
        /** @var User $user */
        $banner = $this->bannerRepository->find($id);

        if (empty($banner)) {
            return $this->sendError('banner not found');
        }

        $banner->delete();

        return $this->sendSuccess('banner deleted successfully');
    }
}
