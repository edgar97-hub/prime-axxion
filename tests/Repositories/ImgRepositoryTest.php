<?php namespace Tests\Repositories;

use App\Models\Img;
use App\Repositories\ImgRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ImgRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ImgRepository
     */
    protected $imgRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->imgRepo = \App::make(ImgRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_img()
    {
        $img = Img::factory()->make()->toArray();

        $createdImg = $this->imgRepo->create($img);

        $createdImg = $createdImg->toArray();
        $this->assertArrayHasKey('id', $createdImg);
        $this->assertNotNull($createdImg['id'], 'Created Img must have id specified');
        $this->assertNotNull(Img::find($createdImg['id']), 'Img with given id must be in DB');
        $this->assertModelData($img, $createdImg);
    }

    /**
     * @test read
     */
    public function test_read_img()
    {
        $img = Img::factory()->create();

        $dbImg = $this->imgRepo->find($img->id);

        $dbImg = $dbImg->toArray();
        $this->assertModelData($img->toArray(), $dbImg);
    }

    /**
     * @test update
     */
    public function test_update_img()
    {
        $img = Img::factory()->create();
        $fakeImg = Img::factory()->make()->toArray();

        $updatedImg = $this->imgRepo->update($fakeImg, $img->id);

        $this->assertModelData($fakeImg, $updatedImg->toArray());
        $dbImg = $this->imgRepo->find($img->id);
        $this->assertModelData($fakeImg, $dbImg->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_img()
    {
        $img = Img::factory()->create();

        $resp = $this->imgRepo->delete($img->id);

        $this->assertTrue($resp);
        $this->assertNull(Img::find($img->id), 'Img should not exist in DB');
    }
}
