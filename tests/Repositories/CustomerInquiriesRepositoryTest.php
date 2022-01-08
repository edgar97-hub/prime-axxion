<?php namespace Tests\Repositories;

use App\Models\CustomerInquiries;
use App\Repositories\CustomerInquiriesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CustomerInquiriesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CustomerInquiriesRepository
     */
    protected $customerInquiriesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->customerInquiriesRepo = \App::make(CustomerInquiriesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_customer_inquiries()
    {
        $customerInquiries = CustomerInquiries::factory()->make()->toArray();

        $createdCustomerInquiries = $this->customerInquiriesRepo->create($customerInquiries);

        $createdCustomerInquiries = $createdCustomerInquiries->toArray();
        $this->assertArrayHasKey('id', $createdCustomerInquiries);
        $this->assertNotNull($createdCustomerInquiries['id'], 'Created CustomerInquiries must have id specified');
        $this->assertNotNull(CustomerInquiries::find($createdCustomerInquiries['id']), 'CustomerInquiries with given id must be in DB');
        $this->assertModelData($customerInquiries, $createdCustomerInquiries);
    }

    /**
     * @test read
     */
    public function test_read_customer_inquiries()
    {
        $customerInquiries = CustomerInquiries::factory()->create();

        $dbCustomerInquiries = $this->customerInquiriesRepo->find($customerInquiries->id);

        $dbCustomerInquiries = $dbCustomerInquiries->toArray();
        $this->assertModelData($customerInquiries->toArray(), $dbCustomerInquiries);
    }

    /**
     * @test update
     */
    public function test_update_customer_inquiries()
    {
        $customerInquiries = CustomerInquiries::factory()->create();
        $fakeCustomerInquiries = CustomerInquiries::factory()->make()->toArray();

        $updatedCustomerInquiries = $this->customerInquiriesRepo->update($fakeCustomerInquiries, $customerInquiries->id);

        $this->assertModelData($fakeCustomerInquiries, $updatedCustomerInquiries->toArray());
        $dbCustomerInquiries = $this->customerInquiriesRepo->find($customerInquiries->id);
        $this->assertModelData($fakeCustomerInquiries, $dbCustomerInquiries->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_customer_inquiries()
    {
        $customerInquiries = CustomerInquiries::factory()->create();

        $resp = $this->customerInquiriesRepo->delete($customerInquiries->id);

        $this->assertTrue($resp);
        $this->assertNull(CustomerInquiries::find($customerInquiries->id), 'CustomerInquiries should not exist in DB');
    }
}
