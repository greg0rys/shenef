<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\CompanyLocations;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return view(
            'company.index',
            compact('companies'));
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
    public function store(StoreCompanyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * The current method needs to be changed to another one, this is a specific type of show.
     */
    public function show(Company $company)
    {
        $company->load('locations');
        $company->loadCount('locations');

        // get the locations of the parent company
        $locations = CompanyLocations::where('parent_company_id', $company->id)->get();
        $locations->loadCount('items');

        return view('company.show', ['company' => $company, 'locations' => $locations]);
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
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        //
    }

    /**
     * @param Company $company - the company we are searching for.
     * Get all child companies under a parent.
     */
    public function getChildCompanies(Company $company)
    {
        $children = CompanyLocations::where(
            'parent_company_id',
            $company->id)
                                    ->get()
        ;
        $children->sortBy('location_id');

        return view(
            'company.children',
            ['children' => $children, 'company' => $company]);
    }
}
