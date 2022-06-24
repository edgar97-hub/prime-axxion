<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Solution;

class SolutionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_solution()
    {
        $solution = Solution::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/solutions', $solution
        );

        $this->assertApiResponse($solution);
    }

    /**
     * @test
     */
    public function test_read_solution()
    {
        $solution = Solution::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/solutions/'.$solution->id
        );

        $this->assertApiResponse($solution->toArray());
    }

    /**
     * @test
     */
    public function test_update_solution()
    {
        $solution = Solution::factory()->create();
        $editedSolution = Solution::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/solutions/'.$solution->id,
            $editedSolution
        );

        $this->assertApiResponse($editedSolution);
    }

    /**
     * @test
     */
    public function test_delete_solution()
    {
        $solution = Solution::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/solutions/'.$solution->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/solutions/'.$solution->id
        );

        $this->response->assertStatus(404);
    }
}
