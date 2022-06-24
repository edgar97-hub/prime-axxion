<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Img;

class ImgApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_img()
    {
        $img = Img::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/imgs', $img
        );

        $this->assertApiResponse($img);
    }

    /**
     * @test
     */
    public function test_read_img()
    {
        $img = Img::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/imgs/'.$img->id
        );

        $this->assertApiResponse($img->toArray());
    }

    /**
     * @test
     */
    public function test_update_img()
    {
        $img = Img::factory()->create();
        $editedImg = Img::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/imgs/'.$img->id,
            $editedImg
        );

        $this->assertApiResponse($editedImg);
    }

    /**
     * @test
     */
    public function test_delete_img()
    {
        $img = Img::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/imgs/'.$img->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/imgs/'.$img->id
        );

        $this->response->assertStatus(404);
    }
}
