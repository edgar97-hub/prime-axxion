<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Ayuda;

class AyudaApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ayuda()
    {
        $ayuda = Ayuda::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ayudas', $ayuda
        );

        $this->assertApiResponse($ayuda);
    }

    /**
     * @test
     */
    public function test_read_ayuda()
    {
        $ayuda = Ayuda::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/ayudas/'.$ayuda->id
        );

        $this->assertApiResponse($ayuda->toArray());
    }

    /**
     * @test
     */
    public function test_update_ayuda()
    {
        $ayuda = Ayuda::factory()->create();
        $editedAyuda = Ayuda::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ayudas/'.$ayuda->id,
            $editedAyuda
        );

        $this->assertApiResponse($editedAyuda);
    }

    /**
     * @test
     */
    public function test_delete_ayuda()
    {
        $ayuda = Ayuda::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ayudas/'.$ayuda->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ayudas/'.$ayuda->id
        );

        $this->response->assertStatus(404);
    }
}
