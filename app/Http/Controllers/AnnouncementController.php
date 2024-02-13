<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\apply;
use App\Models\Company;
use App\Models\skills;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
            $skills = skills::all();   
            $announcements = announcement::paginate(5);
            return view('admin.announcement.index', compact('announcements'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $skills = skills::all();   
        $companies = Company::all();
        return view('admin.announcement.create',compact('companies','skills'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

    
        $announcement=announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'company_id' => $request->company_id ,
            'date' => $request->date,
            
        ]);
        $announcement->skills()->sync($request->skills);
        return redirect()->route('announcements.index')->with('success', 'announcement created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(announcement $announcement)
    {
        return view('singelpage',compact('announcement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(announcement $announcement)
    {
        $companies = Company::all();
        return view('admin.announcement.edit',compact('companies','announcement'));
    }


    public function update(Request $request, announcement $announcement)
{
    $request->validate([
        'title' => 'required',
        'description' => 'required',
        'date' => 'date'
    ]);

    $announcement->update([
        'title' => $request->title,
        'description' => $request->description,
        'company_id' => $request->company_id,
        'date' => $request->date,
    ]);

    return redirect()->route('announcements.index')->with('success', 'announcement updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('announcements.index')->with('success', 'announcement deleted successfully');
    }

    public function recordapply(Request $request, announcement $announcement)
    {
        
        $this->validateJobInterviewDay($announcement);
        
        apply::create([
            'user_id' => auth()->id(),
            'announcement_id' => $announcement->id,
        ]);

        return redirect()->back()->with('success', 'apply recorded successfully');
    }


    public function unrecordapply(Request $request, announcement $announcement)
    {
        $announcement->unrecordapply(auth()->id());

        return redirect()->back()->with('success', 'apply unrecorded successfully');
    }

    protected function validateJobInterviewDay(announcement $announcement)
    {
        $announcementDate = $announcement->date;

        if ($announcementDate < now()->toDateString()) {
            abort(403, 'Job interview day has already passed.');
        }

        if ($announcement->apply()->where('user_id', auth()->id())->exists()) {
            abort(403, 'apply already recorded for this announcement.');
        }
    }
}
