<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionsController extends Controller
{
  
    
        
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view("sections/section" , compact("sections"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "section_name"=>"min:4|required|unique:sections,section_name",
            "description"=>"required",
        ]);
        Section::create([
            "section_name"=> $request->section_name,
            "description"=> $request->description,
            "created_by"=> Auth::user()->name
        ]);
        session()->flash("success" , "the added resource was successfully");
        return redirect()->route("sections");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "section_name"=>"min:4|required|unique:sections,section_name",
            "description"=>"required",
        ]);
        $section = Section::find($request->id);
        $section->section_name = $request->section_name;
        $section->description = $request->description;
        $section->save();
        session()->flash("success" , "the updated resource was successfully");
        return redirect()->route("sections");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Section::destroy($request->id);
        session()->flash("success" , "the deleted resource was successfully");
        return redirect()->route("sections");
    }
}
