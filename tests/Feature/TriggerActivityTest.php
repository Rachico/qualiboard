<?php

namespace Tests\Feature;

use App\Task;
use Facades\Tests\Setup\ProjectFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TriggerActivityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function creating_a_project()
    {
        $project = ProjectFactory::ownedBy($this->signIn())->create();

        $this->assertCount(1, $project->activity);
        $this->assertEquals('created', $project->activity[0]->description);
    }

    /** @test */
        public function updating_a_project()
    {
        $project = ProjectFactory::ownedBy($this->signIn())->create();

        $project->update(['title'=>'changed']);

        $this->assertCount(2, $project->activity);
        $this->assertEquals('updated', $project->activity->last()->description);

    }

    /** @test */
    public function creating_a_new_task()
    {
        $project = ProjectFactory::ownedBy($this->signIn())->create();
        $project->addTask('test task');

        $this->assertCount(2,$project->activity);
        $this->assertEquals('created_task', $project->activity->last()->description);

    }

    /** @test */
    public function completing_a_task()
    {
        $this->withoutExceptionHandling();
        $project = ProjectFactory::ownedBy($this->signIn())
            ->withTasks(1)
            ->create();


        $this->patch($project->tasks[0]->path(),[
            'body' =>'CHANGED BODY',
            'completed' => true,
        ]);


        $this->assertCount(3,$project->activity);
        $this->assertEquals('completed_task', $project->activity->last()->description);

    }

    /** @test */
    public function mark_as_task_as_incomplete()
    {
        $this->withoutExceptionHandling();
        $project = ProjectFactory::ownedBy($this->signIn())
            ->withTasks(1)
            ->create();


        $this->patch($project->tasks[0]->path(),[
            'body' =>'CHANGED BODY',
            'completed' => true,
        ]);

        $this->assertCount(3,$project->activity);

        $this->patch($project->tasks[0]->path(),[
            'body' =>'CHANGED BODY',
            'completed' => false,
        ]);

        $project->refresh();

        $this->assertCount(4,$project->activity);
        $this->assertEquals('marked_as_incomplete_task', $project->activity->last()->description);

    }

    /** @test */

    public function deleting_a_task()
    {
        $this->withoutExceptionHandling();

        $project = ProjectFactory::ownedBy($this->signIn())
            ->withTasks(1)
            ->create();

        $project->tasks[0]->delete();
        $this->assertCount(3,$project->activity);


    }




}
