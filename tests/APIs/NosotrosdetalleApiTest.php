<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Nosotrosdetalle;

class NosotrosdetalleApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_nosotrosdetalle()
    {
        $nosotrosdetalle = Nosotrosdetalle::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/nosotrosdetalles', $nosotrosdetalle
        );

        $this->assertApiResponse($nosotrosdetalle);
    }

    /**
     * @test
     */
    public function test_read_nosotrosdetalle()
    {
        $nosotrosdetalle = Nosotrosdetalle::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/nosotrosdetalles/'.$nosotrosdetalle->id
        );

        $this->assertApiResponse($nosotrosdetalle->toArray());
    }

    /**
     * @test
     */
    public function test_update_nosotrosdetalle()
    {
        $nosotrosdetalle = Nosotrosdetalle::factory()->create();
        $editedNosotrosdetalle = Nosotrosdetalle::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/nosotrosdetalles/'.$nosotrosdetalle->id,
            $editedNosotrosdetalle
        );

        $this->assertApiResponse($editedNosotrosdetalle);
    }

    /**
     * @test
     */
    public function test_delete_nosotrosdetalle()
    {
        $nosotrosdetalle = Nosotrosdetalle::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/nosotrosdetalles/'.$nosotrosdetalle->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/nosotrosdetalles/'.$nosotrosdetalle->id
        );

        $this->response->assertStatus(404);
    }
}
