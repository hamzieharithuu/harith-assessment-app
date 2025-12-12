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
        // all view
        $companies = Company::all();
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // form view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:companies',
            'email' => 'required|email|max:255|unique:companies',
            'logo' => 'required',
            'website_link' => 'required|max:255',
        ],[
            'name.required' => '*Please fill in name',
            'name.unique' => '*Name must be unique',
            'email.required' => '*Please fill in email',
            'email.unique' => '*Email must be unique',
            'email.email' => '*Please fill in the right email',
            'email.max' => '*Email has exceed the maximum length. Please fill in the right email',
            'website_link.required' => '*Please fill in website link',
        ]);

        $data = $request->input();
        $company = new Company();
        $company->name = $data['name'];
        $company->email = $data['email'];
        // store logo here
        $company->logo = $data['name'];
        $company->website_link = $data['website_link'];
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        // $company->where('req')
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        // return redirect()->route('companies.index')
        //                  ->with('success', 'Company deleted successfully!');
    }
}
