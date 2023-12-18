<?php

namespace App\Http\Controllers;

use App\Models\ClassName;
use App\Models\SkillCompetency;
use App\Models\User;
use Illuminate\Http\Request;

class ClassNameController extends Controller
{
    public function index()
    {
        $teacher = User::whereRole('teacher')->get();
        $classes = ClassName::orderBy('name')->get();
        $skill_competencies = SkillCompetency::all();

        return view('classes.index', compact('teacher', 'classes', 'skill_competencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'teacher_id' => 'required|numeric',
            'skill_competency_id' => 'required|numeric'
        ]);

        ClassName::create($request->all());

        return back()->with('success', 'Class data added successfully');
    }
}
