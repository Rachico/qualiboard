<?php

namespace Tests\Feature;

use App\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_project_can_have_tasks()
    {

        $this->signIn();

       $project = factory(Project::class)->create(['owner_id'=>auth()->user()->id]);

       $this->post($project->path() . '/tasks', ['body'=>'Test Task']);

       $this->get($project->path())
           ->assertSee('Test Task');


    }

    /** @test */
    public function a_task_requires_a_body()
    {
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id'=>auth()->user()->id]);

        $attributes = factory('App\Task')->raw(['body' => '']);

        $this->post($project->path() . '/tasks', $attributes)->assertSessionHasErrors('body');
    }

    /** @test */
    public function only_the_owner_of_a_project_may_add_tasks()
    {
        $this->signIn();

        $project = factory(Project::class)->create();

        $this->post($project->path()  . '/tasks',['body'=>'Test Task'])
           ->assertStatus(403);

        $this->assertDatabaseMissing('tasks',['body','Test Task']);

    }


    /** @test */
    public function a_task_can_be_updated()
    {
        $this->withoutExceptionHandling();
        $this->signIn();

        $project = factory(Project::class)->create(['owner_id'=>auth()->user()->id]);

        $task = $project->addTask('test task');

        $this->patch($project->path()  . '/tasks/' . $task->id,[
            'body'=>'changed',
            'completed' => true,
        ]);

        $this->assertDatabaseHas('tasks',[
            'body'=>'changed',
            'completed'=> true
        ]);


    }

}
