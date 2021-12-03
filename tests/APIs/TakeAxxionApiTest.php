<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TakeAxxion;

class TakeAxxionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_take_axxion()
    {
        $takeAxxion = TakeAxxion::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/take_axxions', $takeAxxion
        );

        $this->assertApiResponse($takeAxxion);
    }

    /**
     * @test
     */
    public function test_read_take_axxion()
    {
        $takeAxxion = TakeAxxion::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/take_axxions/'.$takeAxxion->id
        );

        $this->assertApiResponse($takeAxxion->toArray());
    }

    /**
     * @test
     */
    public function test_update_take_axxion()
    {
        $takeAxxion = TakeAxxion::factory()->create();
        $editedTakeAxxion = TakeAxxion::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/take_axxions/'.$takeAxxion->id,
            $editedTakeAxxion
        );

        $this->assertApiResponse($editedTakeAxxion);
    }

    /**
     * @test
     */
    public function test_delete_take_axxion()
    {
        $takeAxxion = TakeAxxion::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/take_axxions/'.$takeAxxion->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/take_axxions/'.$takeAxxion->id
        );

        $this->response->assertStatus(404);
    }
}
