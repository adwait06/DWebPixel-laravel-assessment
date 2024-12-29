<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
		 $skills= Skill::all();
	    return view('livewire.pages.skills.index', compact('skills'));
		
	// return view('livewire.pages.skills.index');
    }      
        	
    public function store(Request $request)
    {
		
	$request->validate([
            'name' => 'required|string|max:255',
        ]);
		
        $skill = Skill::create($request->all());
        return response()->json($skill);
		
		
		

        // Skill::create($request->all());

        // return redirect()->route('skills.index')->with('success', 'Skill added successfully.');
    }
	
	 public function edit($id)
    {
		$skills = Skill::findOrFail($id);
        return view('livewire.pages.skills.index', compact('skills'));
		
        
    }
	
	  public function update(Request $request, $id)
    {
		$request->validate(['name' => 'required|string|max:255']);
        $skill = Skill::findOrFail($id);
        $skill->update($request->all());

        return redirect()->route('admin.skills.index')->with('success', 'Skill updated successfully.');
  
  
		// $skill = Skill::find($id);
        // $skill->update($request->all());
        // return response()->json($skill);
    }
	
	 public function destroy($id)
    {
		$skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('admin.skills.index')->with('success', 'Skill deleted successfully.');


        // Skill::find($id)->delete();
        // return response()->json(['success' => 'skill deleted successfully.']);
    }
      
}

