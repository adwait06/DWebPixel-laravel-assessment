<?php

namespace App\Livewire\Pages\Jobs;

use Livewire\Component;
use App\Models\Skill;
use App\Models\Job;

class Create extends Component
{
    public function render()
    {
		  $skills = Skill::all();
		$jobs= Job::all();			 
	     return view('livewire.pages.jobs.create', compact('jobs', 'skills'));
      //  return view('livewire.pages.jobs.create');
    }
}
