<?php namespace Tests\Repositories;

use App\Models\TakeAxxion;
use App\Repositories\TakeAxxionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TakeAxxionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TakeAxxionRepository
     */
    protected $takeAxxionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->takeAxxionRepo = \App::make(TakeAxxionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_take_axxion()
    {
        $takeAxxion = TakeAxxion::factory()->make()->toArray();

        $createdTakeAxxion = $this->takeAxxionRepo->create($takeAxxion);

        $createdTakeAxxion = $createdTakeAxxion->toArray();
        $this->assertArrayHasKey('id', $createdTakeAxxion);
        $this->assertNotNull($createdTakeAxxion['id'], 'Created TakeAxxion must have id specified');
        $this->assertNotNull(TakeAxxion::find($createdTakeAxxion['id']), 'TakeAxxion with given id must be in DB');
        $this->assertModelData($takeAxxion, $createdTakeAxxion);
    }

    /**
     * @test read
     */
    public function test_read_take_axxion()
    {
        $takeAxxion = TakeAxxion::factory()->create();

        $dbTakeAxxion = $this->takeAxxionRepo->find($takeAxxion->id);

        $dbTakeAxxion = $dbTakeAxxion->toArray();
        $this->assertModelData($takeAxxion->toArray(), $dbTakeAxxion);
    }

    /**
     * @test update
     */
    public function test_update_take_axxion()
    {
        $takeAxxion = TakeAxxion::factory()->create();
        $fakeTakeAxxion = TakeAxxion::factory()->make()->toArray();

        $updatedTakeAxxion = $this->takeAxxionRepo->update($fakeTakeAxxion, $takeAxxion->id);

        $this->assertModelData($fakeTakeAxxion, $updatedTakeAxxion->toArray());
        $dbTakeAxxion = $this->takeAxxionRepo->find($takeAxxion->id);
        $this->assertModelData($fakeTakeAxxion, $dbTakeAxxion->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_take_axxion()
    {
        $takeAxxion = TakeAxxion::factory()->create();

        $resp = $this->takeAxxionRepo->delete($takeAxxion->id);

        $this->assertTrue($resp);
        $this->assertNull(TakeAxxion::find($takeAxxion->id), 'TakeAxxion should not exist in DB');
    }
}
