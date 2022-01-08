<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCustomerInquiriesAPIRequest;
use App\Http\Requests\API\UpdateCustomerInquiriesAPIRequest;
use App\Models\CustomerInquiries;
use App\Repositories\CustomerInquiriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CustomerInquiriesController
 * @package App\Http\Controllers\API
 */

class CustomerInquiriesAPIController extends AppBaseController
{
    /** @var  CustomerInquiriesRepository */
    private $customerInquiriesRepository;

    public function __construct(CustomerInquiriesRepository $customerInquiriesRepo)
    {
        $this->customerInquiriesRepository = $customerInquiriesRepo;
    }

    /**
     * Display a listing of the CustomerInquiries.
     * GET|HEAD /customerInquiries
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $customerInquiries = $this->customerInquiriesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($customerInquiries->toArray(), 'Customer Inquiries retrieved successfully');
    }

    /**
     * Store a newly created CustomerInquiries in storage.
     * POST /customerInquiries
     *
     * @param CreateCustomerInquiriesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerInquiriesAPIRequest $request)
    {
        $input = $request->all();

        $customerInquiries = $this->customerInquiriesRepository->create($input);

        return $this->sendResponse($customerInquiries->toArray(), 'Customer Inquiries saved successfully');
    }

    /**
     * Display the specified CustomerInquiries.
     * GET|HEAD /customerInquiries/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CustomerInquiries $customerInquiries */
        $customerInquiries = $this->customerInquiriesRepository->find($id);

        if (empty($customerInquiries)) {
            return $this->sendError('Customer Inquiries not found');
        }

        return $this->sendResponse($customerInquiries->toArray(), 'Customer Inquiries retrieved successfully');
    }

    /**
     * Update the specified CustomerInquiries in storage.
     * PUT/PATCH /customerInquiries/{id}
     *
     * @param int $id
     * @param UpdateCustomerInquiriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerInquiriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var CustomerInquiries $customerInquiries */
        $customerInquiries = $this->customerInquiriesRepository->find($id);

        if (empty($customerInquiries)) {
            return $this->sendError('Customer Inquiries not found');
        }

        $customerInquiries = $this->customerInquiriesRepository->update($input, $id);

        return $this->sendResponse($customerInquiries->toArray(), 'CustomerInquiries updated successfully');
    }

    /**
     * Remove the specified CustomerInquiries from storage.
     * DELETE /customerInquiries/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CustomerInquiries $customerInquiries */
        $customerInquiries = $this->customerInquiriesRepository->find($id);

        if (empty($customerInquiries)) {
            return $this->sendError('Customer Inquiries not found');
        }

        $customerInquiries->delete();

        return $this->sendSuccess('Customer Inquiries deleted successfully');
    }
}
