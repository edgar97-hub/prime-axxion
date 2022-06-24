<?php namespace Tests\Repositories;

use App\Models\Solution;
use App\Repositories\SolutionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SolutionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SolutionRepository
     */
    protected $solutionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->solutionRepo = \App::make(SolutionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_solution()
    {
        $solution = Solution::factory()->make()->toArray();

        $createdSolution = $this->solutionRepo->create($solution);

        $createdSolution = $createdSolution->toArray();
        $this->assertArrayHasKey('id', $createdSolution);
        $this->assertNotNull($createdSolution['id'], 'Created Solution must have id specified');
        $this->assertNotNull(Solution::find($createdSolution['id']), 'Solution with given id must be in DB');
        $this->assertModelData($solution, $createdSolution);
    }

    /**
     * @test read
     */
    public function test_read_solution()
    {
        $solution = Solution::factory()->create();

        $dbSolution = $this->solutionRepo->find($solution->id);

        $dbSolution = $dbSolution->toArray();
        $this->assertModelData($solution->toArray(), $dbSolution);
    }

    /**
     * @test update
     */
    public function test_update_solution()
    {
        $solution = Solution::factory()->create();
        $fakeSolution = Solution::factory()->make()->toArray();

        $updatedSolution = $this->solutionRepo->update($fakeSolution, $solution->id);

        $this->assertModelData($fakeSolution, $updatedSolution->toArray());
        $dbSolution = $this->solutionRepo->find($solution->id);
        $this->assertModelData($fakeSolution, $dbSolution->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_solution()
    {
        $solution = Solution::factory()->create();

        $resp = $this->solutionRepo->delete($solution->id);

        $this->assertTrue($resp);
        $this->assertNull(Solution::find($solution->id), 'Solution should not exist in DB');
    }
}
