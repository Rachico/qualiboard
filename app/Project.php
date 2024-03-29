<?php

namespace App;

use App\Activity;
use Illuminate\Database\Eloquent\Model;
use App\Task;
use App\User;


class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'owner_id',
        'notes',
    ];

    public function path()
    {
        return "/projects/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }

    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function recordActivity($description)
    {
        $this->activity()->create(compact('description'));
    }

}
