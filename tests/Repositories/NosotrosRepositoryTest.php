<?php namespace Tests\Repositories;

use App\Models\Nosotros;
use App\Repositories\NosotrosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class NosotrosRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var NosotrosRepository
     */
    protected $nosotrosRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->nosotrosRepo = \App::make(NosotrosRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_nosotros()
    {
        $nosotros = Nosotros::factory()->make()->toArray();

        $createdNosotros = $this->nosotrosRepo->create($nosotros);

        $createdNosotros = $createdNosotros->toArray();
        $this->assertArrayHasKey('id', $createdNosotros);
        $this->assertNotNull($createdNosotros['id'], 'Created Nosotros must have id specified');
        $this->assertNotNull(Nosotros::find($createdNosotros['id']), 'Nosotros with given id must be in DB');
        $this->assertModelData($nosotros, $createdNosotros);
    }

    /**
     * @test read
     */
    public function test_read_nosotros()
    {
        $nosotros = Nosotros::factory()->create();

        $dbNosotros = $this->nosotrosRepo->find($nosotros->id);

        $dbNosotros = $dbNosotros->toArray();
        $this->assertModelData($nosotros->toArray(), $dbNosotros);
    }

    /**
     * @test update
     */
    public function test_update_nosotros()
    {
        $nosotros = Nosotros::factory()->create();
        $fakeNosotros = Nosotros::factory()->make()->toArray();

        $updatedNosotros = $this->nosotrosRepo->update($fakeNosotros, $nosotros->id);

        $this->assertModelData($fakeNosotros, $updatedNosotros->toArray());
        $dbNosotros = $this->nosotrosRepo->find($nosotros->id);
        $this->assertModelData($fakeNosotros, $dbNosotros->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_nosotros()
    {
        $nosotros = Nosotros::factory()->create();

        $resp = $this->nosotrosRepo->delete($nosotros->id);

        $this->assertTrue($resp);
        $this->assertNull(Nosotros::find($nosotros->id), 'Nosotros should not exist in DB');
    }
}
