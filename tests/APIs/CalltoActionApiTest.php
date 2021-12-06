<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CalltoAction;

class CalltoActionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_callto_action()
    {
        $calltoAction = CalltoAction::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/callto_actions', $calltoAction
        );

        $this->assertApiResponse($calltoAction);
    }

    /**
     * @test
     */
    public function test_read_callto_action()
    {
        $calltoAction = CalltoAction::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/callto_actions/'.$calltoAction->id
        );

        $this->assertApiResponse($calltoAction->toArray());
    }

    /**
     * @test
     */
    public function test_update_callto_action()
    {
        $calltoAction = CalltoAction::factory()->create();
        $editedCalltoAction = CalltoAction::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/callto_actions/'.$calltoAction->id,
            $editedCalltoAction
        );

        $this->assertApiResponse($editedCalltoAction);
    }

    /**
     * @test
     */
    public function test_delete_callto_action()
    {
        $calltoAction = CalltoAction::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/callto_actions/'.$calltoAction->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/callto_actions/'.$calltoAction->id
        );

        $this->response->assertStatus(404);
    }
}
