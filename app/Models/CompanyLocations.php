<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CompanyLocations extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyLocationsFactory> */
    use HasFactory;

    protected $table = 'company_locations';
    protected $fillable = [
        'parent_company_id',
        'name',
        'address',
        'city',
        'state',
        'zip',
        'location_id'
    ];
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
    // a location will have any given number of users.
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
