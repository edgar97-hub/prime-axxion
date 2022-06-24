<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateImgAPIRequest;
use App\Http\Requests\API\UpdateImgAPIRequest;
use App\Models\Img;
use App\Repositories\ImgRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ImgController
 * @package App\Http\Controllers\API
 */

class ImgAPIController extends AppBaseController
{
    /** @var  ImgRepository */
    private $imgRepository;

    public function __construct(ImgRepository $imgRepo)
    {
        $this->imgRepository = $imgRepo;
    }

    /**
     * Display a listing of the Img.
     * GET|HEAD /imgs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $imgs = $this->imgRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($imgs->toArray(), 'Imgs retrieved successfully');
    }

    /**
     * Store a newly created Img in storage.
     * POST /imgs
     *
     * @param CreateImgAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateImgAPIRequest $request)
    {
        $input = $request->all();

        $img = $this->imgRepository->create($input);

        return $this->sendResponse($img->toArray(), 'Img saved successfully');
    }

    /**
     * Display the specified Img.
     * GET|HEAD /imgs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Img $img */
        $img = $this->imgRepository->find($id);

        if (empty($img)) {
            return $this->sendError('Img not found');
        }

        return $this->sendResponse($img->toArray(), 'Img retrieved successfully');
    }

    /**
     * Update the specified Img in storage.
     * PUT/PATCH /imgs/{id}
     *
     * @param int $id
     * @param UpdateImgAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateImgAPIRequest $request)
    {
        $input = $request->all();

        /** @var Img $img */
        $img = $this->imgRepository->find($id);

        if (empty($img)) {
            return $this->sendError('Img not found');
        }

        $img = $this->imgRepository->update($input, $id);

        return $this->sendResponse($img->toArray(), 'Img updated successfully');
    }

    /**
     * Remove the specified Img from storage.
     * DELETE /imgs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Img $img */
        $img = $this->imgRepository->find($id);

        if (empty($img)) {
            return $this->sendError('Img not found');
        }

        $img->delete();

        return $this->sendSuccess('Img deleted successfully');
    }
}
