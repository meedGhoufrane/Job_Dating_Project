<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\Company;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
            $announcements = announcement::all();
            return view('admin.announcement.index', compact('announcements'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('admin.announcement.create',compact('companies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'discription' => 'required',
            'company_id	' => 'required'
        ]);

    
        announcement::create([
            'title' => $request->name,
            'discription' => $request->discription,
            'company_id' => $request->company_id ,
            
        ]);

        return redirect()->route('announcements.index')->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(announcement $announcement)
    {
        //
    }
}
