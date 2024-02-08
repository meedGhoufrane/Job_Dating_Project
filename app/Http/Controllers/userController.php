<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $user = user::latest()->paginate(6);
        return view('admin.users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        User::create([
            'name' => $request->name,
        ]);

        return redirect()->route('user.index')->with('success', 'user created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user->update([
            'name' => $request->name,
        ]);

        return redirect()->route('user.index')->with('success', 'Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {

        $user->delete();
        return redirect()->route('user.index')->with('success', 'Skill deleted successfully');
    }
}


