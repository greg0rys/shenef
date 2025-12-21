<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyLocationsRequest;
use App\Http\Requests\UpdateCompanyLocationsRequest;
use App\Models\CompanyLocations;
use App\Models\Item;

class CompanyLocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = CompanyLocations::all()
                                     ->unique('name')
                                     ->sortBy('location_id')
        ; // dont get repeats and sort
        // them by their location id

        return view(
            'companylocations.index',
            compact('locations'));
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
    public function store(StoreCompanyLocationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CompanyLocations $companyLocation)
    {
        $items = Item::where(
            'company_location_id',
            '=',
            $companyLocation->id)
                     ->get()
        ;
        $company_name = $companyLocation->name;
        return view(
            'company_locations.index',
            ['company_name' => $company_name, 'items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CompanyLocations $companyLocations)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyLocationsRequest $request, CompanyLocations $companyLocations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CompanyLocations $companyLocations)
    {
        //
    }

    /**
     * @param CompanyLocations $companyLocation
     *
     * Get the items for a given company location. This expects the eloquent id not the facility id
     */
    public function getLocationItems(CompanyLocations $companyLocation)
    {
        $items = Item::where(
            'company_location_id',
            '=',
            $companyLocation->id)
                     ->get()
        ;
        return view(
            'company_locations.index',
            compact('items'));
    }

}
