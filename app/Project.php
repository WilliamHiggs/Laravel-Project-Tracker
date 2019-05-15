<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $guarded = [];

    protected static function boot()
    {
      parent::boot();

      static::deleted(function ($project){
        //DELETE USERS TASKS
      });
    }

    public function owner()
    {
      return $this->belongsTo(User::class);
    }

    public function tasks()
    {
      return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
      $this->tasks()->create($task);
    }

}
