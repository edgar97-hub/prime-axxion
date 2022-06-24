<?php namespace Tests\Repositories;

use App\Models\Nosotrosdetalle;
use App\Repositories\NosotrosdetalleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NosotrosdetalleRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NosotrosdetalleRepository
     */
    protected $nosotrosdetalleRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nosotrosdetalleRepo = \App::make(NosotrosdetalleRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_nosotrosdetalle()
    {
        $nosotrosdetalle = Nosotrosdetalle::factory()->make()->toArray();

        $createdNosotrosdetalle = $this->nosotrosdetalleRepo->create($nosotrosdetalle);

        $createdNosotrosdetalle = $createdNosotrosdetalle->toArray();
        $this->assertArrayHasKey('id', $createdNosotrosdetalle);
        $this->assertNotNull($createdNosotrosdetalle['id'], 'Created Nosotrosdetalle must have id specified');
        $this->assertNotNull(Nosotrosdetalle::find($createdNosotrosdetalle['id']), 'Nosotrosdetalle with given id must be in DB');
        $this->assertModelData($nosotrosdetalle, $createdNosotrosdetalle);
    }

    /**
     * @test read
     */
    public function test_read_nosotrosdetalle()
    {
        $nosotrosdetalle = Nosotrosdetalle::factory()->create();

        $dbNosotrosdetalle = $this->nosotrosdetalleRepo->find($nosotrosdetalle->id);

        $dbNosotrosdetalle = $dbNosotrosdetalle->toArray();
        $this->assertModelData($nosotrosdetalle->toArray(), $dbNosotrosdetalle);
    }

    /**
     * @test update
     */
    public function test_update_nosotrosdetalle()
    {
        $nosotrosdetalle = Nosotrosdetalle::factory()->create();
        $fakeNosotrosdetalle = Nosotrosdetalle::factory()->make()->toArray();

        $updatedNosotrosdetalle = $this->nosotrosdetalleRepo->update($fakeNosotrosdetalle, $nosotrosdetalle->id);

        $this->assertModelData($fakeNosotrosdetalle, $updatedNosotrosdetalle->toArray());
        $dbNosotrosdetalle = $this->nosotrosdetalleRepo->find($nosotrosdetalle->id);
        $this->assertModelData($fakeNosotrosdetalle, $dbNosotrosdetalle->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_nosotrosdetalle()
    {
        $nosotrosdetalle = Nosotrosdetalle::factory()->create();

        $resp = $this->nosotrosdetalleRepo->delete($nosotrosdetalle->id);

        $this->assertTrue($resp);
        $this->assertNull(Nosotrosdetalle::find($nosotrosdetalle->id), 'Nosotrosdetalle should not exist in DB');
    }
}
