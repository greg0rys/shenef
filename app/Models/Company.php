<?php

namespace App\Models;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    /** @use HasFactory<CompanyFactory> */
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = [
        'name',
        'address',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'name' => 'string',
        'address' => 'string',
    ];

    /**
     * A company can have many locations under it.
     * @return HasMany
     */
    public function locations(): HasMany
    {
        return $this->hasMany(CompanyLocations::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }


}
