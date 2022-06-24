<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerInquiriesRequest;
use App\Http\Requests\UpdateCustomerInquiriesRequest;
use App\Repositories\CustomerInquiriesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CustomerInquiriesController extends AppBaseController
{
    /** @var  CustomerInquiriesRepository */
    private $customerInquiriesRepository;

    public function __construct(CustomerInquiriesRepository $customerInquiriesRepo)
    {
        $this->customerInquiriesRepository = $customerInquiriesRepo;
    }

    /**
     * Display a listing of the CustomerInquiries.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $customerInquiries = $this->customerInquiriesRepository->all();

        return view('customer_inquiries.index')
            ->with('customerInquiries', $customerInquiries);
    }

    /**
     * Show the form for creating a new CustomerInquiries.
     *
     * @return Response
     */
    public function create()
    {
        return view('customer_inquiries.create');
    }

    /**
     * Store a newly created CustomerInquiries in storage.
     *
     * @param CreateCustomerInquiriesRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerInquiriesRequest $request)
    {
        $input = $request->all();

        $customerInquiries = $this->customerInquiriesRepository->create($input);

        Flash::success('Customer Inquiries saved successfully.');

        return redirect(route('customerInquiries.index'));
    }

    /**
     * Display the specified CustomerInquiries.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customerInquiries = $this->customerInquiriesRepository->find($id);

        if (empty($customerInquiries)) {
            Flash::error('Customer Inquiries not found');

            return redirect(route('customerInquiries.index'));
        }

        return view('customer_inquiries.show')->with('customerInquiries', $customerInquiries);
    }

    /**
     * Show the form for editing the specified CustomerInquiries.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customerInquiries = $this->customerInquiriesRepository->find($id);

        if (empty($customerInquiries)) {
            Flash::error('Customer Inquiries not found');

            return redirect(route('customerInquiries.index'));
        }

        return view('customer_inquiries.edit')->with('customerInquiries', $customerInquiries);
    }

    /**
     * Update the specified CustomerInquiries in storage.
     *
     * @param int $id
     * @param UpdateCustomerInquiriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerInquiriesRequest $request)
    {
        $customerInquiries = $this->customerInquiriesRepository->find($id);

        if (empty($customerInquiries)) {
            Flash::error('Customer Inquiries not found');

            return redirect(route('customerInquiries.index'));
        }

        $customerInquiries = $this->customerInquiriesRepository->update($request->all(), $id);

        Flash::success('Customer Inquiries updated successfully.');

        return redirect(route('customerInquiries.index'));
    }

    /**
     * Remove the specified CustomerInquiries from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customerInquiries = $this->customerInquiriesRepository->find($id);

        if (empty($customerInquiries)) {
            Flash::error('Customer Inquiries not found');

            return redirect(route('customerInquiries.index'));
        }

        $this->customerInquiriesRepository->delete($id);

        Flash::success('eliminado con éxito.');

        return redirect(route('customerInquiries.index'));
    }
}
