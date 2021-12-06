<?php namespace Tests\Repositories;

use App\Models\Ayuda;
use App\Repositories\AyudaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AyudaRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AyudaRepository
     */
    protected $ayudaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ayudaRepo = \App::make(AyudaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ayuda()
    {
        $ayuda = Ayuda::factory()->make()->toArray();

        $createdAyuda = $this->ayudaRepo->create($ayuda);

        $createdAyuda = $createdAyuda->toArray();
        $this->assertArrayHasKey('id', $createdAyuda);
        $this->assertNotNull($createdAyuda['id'], 'Created Ayuda must have id specified');
        $this->assertNotNull(Ayuda::find($createdAyuda['id']), 'Ayuda with given id must be in DB');
        $this->assertModelData($ayuda, $createdAyuda);
    }

    /**
     * @test read
     */
    public function test_read_ayuda()
    {
        $ayuda = Ayuda::factory()->create();

        $dbAyuda = $this->ayudaRepo->find($ayuda->id);

        $dbAyuda = $dbAyuda->toArray();
        $this->assertModelData($ayuda->toArray(), $dbAyuda);
    }

    /**
     * @test update
     */
    public function test_update_ayuda()
    {
        $ayuda = Ayuda::factory()->create();
        $fakeAyuda = Ayuda::factory()->make()->toArray();

        $updatedAyuda = $this->ayudaRepo->update($fakeAyuda, $ayuda->id);

        $this->assertModelData($fakeAyuda, $updatedAyuda->toArray());
        $dbAyuda = $this->ayudaRepo->find($ayuda->id);
        $this->assertModelData($fakeAyuda, $dbAyuda->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ayuda()
    {
        $ayuda = Ayuda::factory()->create();

        $resp = $this->ayudaRepo->delete($ayuda->id);

        $this->assertTrue($resp);
        $this->assertNull(Ayuda::find($ayuda->id), 'Ayuda should not exist in DB');
    }
}
