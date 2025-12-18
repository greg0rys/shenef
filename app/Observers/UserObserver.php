<?php

namespace App\Observers;

use App\Models\Company;
use App\Models\User;

class UserObserver
{
    public function creating(User $user): void
    {
        $company = Company::find($user->company_location_id);

        if (empty($user->username)){
            $user->username = $this->generateUsername($user->first_name, $user->last_name);
        }

        if (empty($user->company_email)){
            // Remove spaces from company name before appending .com
            $cleanCompanyName = str_replace(' ', '', strtolower($company->name));
            $user->company_email = $user->username . '@' . $cleanCompanyName . '.com';
        }

        if (empty($user->full_name)){
            $user->full_name = $user->first_name . ' ' . $user->last_name;
        }

        if(empty($user->remember_token))
        {
            $user->remember_token = hash('sha256', $user->username);

        }
        $user->email_verified_at = now();
    }

    public function generateUsername(string $firstName, string $lastName): string
    {
        // Get first 2 letters of first name + full last name
        $base = strtolower(substr($firstName, 0, 2) . $lastName);

        // Remove spaces and special characters
        $base = preg_replace('/[^a-z0-9]/', '', $base);

        // Check if username exists and add number if needed
        $username = $base;
        $counter = 1;

        while (User::where('username', $username)->exists()) {
            $username = $base . $counter;
            $counter++;
        }

        return $username;
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        //
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $company_name = Company::find($user->company_location_id);

        // Regenerate username if first_name or last_name changes
        if ($user->isDirty(['first_name', 'last_name'])) {
            $user->username = $this->generateUsername($user->first_name, $user->last_name);
            $user->full_name = $user->first_name . ' ' . $user->last_name;
            $user->company_email = $user->username . '@' . strtolower($company_name->name) . '.com';
            $user->saveQuietly(); // Save without triggering events again
        }

        // Regenerate email if username or company_name changes
        if ($user->isDirty(['username', 'company_name'])) {
            $user->company_email = $user->username . '@' . strtolower($company_name->name) . '.com';
            $user->saveQuietly();
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
