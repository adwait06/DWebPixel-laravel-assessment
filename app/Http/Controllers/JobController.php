<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Skill;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
		$skills = Skill::all();
      //  return view('job.create', compact('skills'));
		//return view('livewire.pages.jobs.index');
		 $jobs= Job::all();		
	     return view('livewire.pages.jobs.index', compact('jobs', 'skills'));
		//echo 'dd'; die;
        // $jobs = Job::all();
        // return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('livewire.pages.jobs.create');
    }
 
    public function store(Request $request)
    {
       
		$validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric',
			'company_name' => 'required|string',
            'company_logo' => 'nullable|string',
            'experience' => 'required|string',
			 'skills' => 'required|string',
            'extra' => 'nullable|string',
			 'company_logo' => 'nullable|string',
			 'location' => 'required|string',
        ]);
		//print_r($validatedData); die;
		 if ($request->hasFile('company_logo')) {
            // Store the file in the 'public' disk, under the 'company_logos' folder
            $logoPath = $request->file('company_logo')->store('company_logos', 'public');
        }
		else
		{
			 $logoPath = '';
		}
		
		 Job::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'company_name' => $validatedData['company_name'],
            'company_logo' => $logoPath,  
            'experience' => $validatedData['experience'],
            'salary' => $validatedData['salary'],
            'location' => $validatedData['location'],
            'skills' => $validatedData['skills'],
            'extra' => $validatedData['extra'],
        ]);

        //Job::create($request->all());
        return redirect()->route('admin.jobs.index')->with('success', 'Job created successfully.');
    }

    public function edit(Job $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric',
        ]);

        $job->update($request->all());
        return redirect()->route('admin.jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully.');
    }
	
	public function search(Request $request)
    {
        $query = Job::query();

        // Filter by title if provided
        if ($request->has('title') && !empty($request->title)) {
            $query->where('title', 'LIKE', '%' . $request->title . '%');
        }

        // Filter by location if provided
        if ($request->has('location') && !empty($request->location)) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        // Get paginated results
        $jobs = $query->paginate(10);

        return response()->json($jobs);
    }
}
