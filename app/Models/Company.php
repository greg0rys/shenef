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

    public function locations(): HasMany
    {
        return $this->hasMany(CompanyLocations::class);
    }


}
