<?php

namespace App\Models;

use Database\Factories\CompanyLocationsFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;


class CompanyLocations extends Model
{
    /** @use HasFactory<CompanyLocationsFactory> */
    use HasFactory, Notifiable;

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

    /**
     * A company location must belong to a parent company
     * We need to learn what convention laravel expects so we don't have to specify our keys
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(
            Company::class,
            'parent_company_id',
            'id');
    }

    /**
     * A location can have many users assigned
     * @return HasMany
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    /**
     * A given location will have many items associated with it.
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(
            Item::class,
            'company_location_id',
            'id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_user', 'id');
    }
}
