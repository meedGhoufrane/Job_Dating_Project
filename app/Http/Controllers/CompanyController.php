<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(2);
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'discription' => 'required',
        ]);


        Company::create([
            'name' => $request->name,
            'discription' => $request->discription,
        ]);

        return redirect()->route('companies.index')->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */

    public function show(Company $company)
    {
        return view('admin.companies.show', compact('company'));
    }
    
    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Company $company)
    {
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {

        $request->validate([
            'name' => 'required',
            'discription' => 'required',
        ]);
        $company->update([
            'name' => $request->name,
            'discription' => $request->discription,
        ]);

        return redirect()->route('companies.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
    }
}
