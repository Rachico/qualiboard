<?php

namespace App\Observers;

use App\Activity;
use App\Project;

class ProjectObserver
{
    /**
     * Handle the project "created" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function created(Project $project)
    {
        $this->recordActivity('createdp',$project);
    }

    /**
     * Handle the project "updated" event.
     *
     * @param  \App\Project  $project
     * @return void
     */
    public function updated(Project $project)
    {
        $this->recordActivity('updated',$project);
    }

    protected function recordActivity($type, $project)
    {
        Activity::create([
            'project_id' => $project->id,
            'description' => $type
        ]);

    }


}