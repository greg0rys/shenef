<?php

namespace App\Observers;

use App\Models\CompanyLocations;


class CompanyUser
{

    public function creating(CompanyLocations $companyLocations): void
    {
        // make assignment to parent_company
        if(empty($companyLocations->parent_company_id)):
            $companyLocations->parent_company_id = 4; // this is the dummy default
        endif;

        if(!$companyLocations->location_id)
        {
            $companyLocations->location_id = 900;
        }

        if(empty($companyLocations->name))
        {
            $companyLocations->name = "NULL NAME";
        }

        if(empty($companyLocations->address))
        {
            $companyLocations->address = fake()->address();
        }

        if(empty($companyLocations->city))
        {
            $companyLocations->city = "NULL CITY";
        }

        if(empty($companyLocations->state))
        {
            $companyLocations->state = "NULL STATE";
        }

        if(empty($companyLocations->zip))
        {
            $companyLocations->zip = 97564;
        }

        if(!$companyLocations->parent_company_id)
        {
            $companyLocations->parent_company_id = 4;
        }


        $companyLocations->updated_at = now();
    }
    /**
     * Handle the CompanyLocations "created" event.
     */
    public function created(CompanyLocations $companyLocations): void
    {


    }

    /**
     * Handle the CompanyLocations "updated" event.
     */
    public function updated(CompanyLocations $companyLocations): void
    {
        //
    }

    /**
     * Handle the CompanyLocations "deleted" event.
     */
    public function deleted(CompanyLocations $companyLocations): void
    {
        //
    }

    /**
     * Handle the CompanyLocations "restored" event.
     */
    public function restored(CompanyLocations $companyLocations): void
    {
        //
    }

    /**
     * Handle the CompanyLocations "force deleted" event.
     */
    public function forceDeleted(CompanyLocations $companyLocations): void
    {
        //
    }
}
