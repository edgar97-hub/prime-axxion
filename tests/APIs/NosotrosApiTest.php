<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Nosotros;

class NosotrosApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_nosotros()
    {
        $nosotros = Nosotros::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/nosotros', $nosotros
        );

        $this->assertApiResponse($nosotros);
    }

    /**
     * @test
     */
    public function test_read_nosotros()
    {
        $nosotros = Nosotros::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/nosotros/'.$nosotros->id
        );

        $this->assertApiResponse($nosotros->toArray());
    }

    /**
     * @test
     */
    public function test_update_nosotros()
    {
        $nosotros = Nosotros::factory()->create();
        $editedNosotros = Nosotros::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/nosotros/'.$nosotros->id,
            $editedNosotros
        );

        $this->assertApiResponse($editedNosotros);
    }

    /**
     * @test
     */
    public function test_delete_nosotros()
    {
        $nosotros = Nosotros::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/nosotros/'.$nosotros->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/nosotros/'.$nosotros->id
        );

        $this->response->assertStatus(404);
    }
}
