<?php namespace Tests\Repositories;

use App\Models\CalltoAction;
use App\Repositories\CalltoActionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CalltoActionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CalltoActionRepository
     */
    protected $calltoActionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->calltoActionRepo = \App::make(CalltoActionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_callto_action()
    {
        $calltoAction = CalltoAction::factory()->make()->toArray();

        $createdCalltoAction = $this->calltoActionRepo->create($calltoAction);

        $createdCalltoAction = $createdCalltoAction->toArray();
        $this->assertArrayHasKey('id', $createdCalltoAction);
        $this->assertNotNull($createdCalltoAction['id'], 'Created CalltoAction must have id specified');
        $this->assertNotNull(CalltoAction::find($createdCalltoAction['id']), 'CalltoAction with given id must be in DB');
        $this->assertModelData($calltoAction, $createdCalltoAction);
    }

    /**
     * @test read
     */
    public function test_read_callto_action()
    {
        $calltoAction = CalltoAction::factory()->create();

        $dbCalltoAction = $this->calltoActionRepo->find($calltoAction->id);

        $dbCalltoAction = $dbCalltoAction->toArray();
        $this->assertModelData($calltoAction->toArray(), $dbCalltoAction);
    }

    /**
     * @test update
     */
    public function test_update_callto_action()
    {
        $calltoAction = CalltoAction::factory()->create();
        $fakeCalltoAction = CalltoAction::factory()->make()->toArray();

        $updatedCalltoAction = $this->calltoActionRepo->update($fakeCalltoAction, $calltoAction->id);

        $this->assertModelData($fakeCalltoAction, $updatedCalltoAction->toArray());
        $dbCalltoAction = $this->calltoActionRepo->find($calltoAction->id);
        $this->assertModelData($fakeCalltoAction, $dbCalltoAction->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_callto_action()
    {
        $calltoAction = CalltoAction::factory()->create();

        $resp = $this->calltoActionRepo->delete($calltoAction->id);

        $this->assertTrue($resp);
        $this->assertNull(CalltoAction::find($calltoAction->id), 'CalltoAction should not exist in DB');
    }
}
