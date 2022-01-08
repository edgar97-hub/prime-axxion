<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CustomerInquiries;

class CustomerInquiriesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_customer_inquiries()
    {
        $customerInquiries = CustomerInquiries::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/customer_inquiries', $customerInquiries
        );

        $this->assertApiResponse($customerInquiries);
    }

    /**
     * @test
     */
    public function test_read_customer_inquiries()
    {
        $customerInquiries = CustomerInquiries::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/customer_inquiries/'.$customerInquiries->id
        );

        $this->assertApiResponse($customerInquiries->toArray());
    }

    /**
     * @test
     */
    public function test_update_customer_inquiries()
    {
        $customerInquiries = CustomerInquiries::factory()->create();
        $editedCustomerInquiries = CustomerInquiries::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/customer_inquiries/'.$customerInquiries->id,
            $editedCustomerInquiries
        );

        $this->assertApiResponse($editedCustomerInquiries);
    }

    /**
     * @test
     */
    public function test_delete_customer_inquiries()
    {
        $customerInquiries = CustomerInquiries::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/customer_inquiries/'.$customerInquiries->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/customer_inquiries/'.$customerInquiries->id
        );

        $this->response->assertStatus(404);
    }
}
