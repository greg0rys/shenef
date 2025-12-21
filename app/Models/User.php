<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'company_location_id',
        'role_id',
        'first_name',
        'last_name',
        'full_name',
        'company_email',
        'personal_email',
        'company_name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /**
     * A user can have any given number of assigned items.
     * @return HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    /**
     * @return BelongsTo
     * Get a given users job role.
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(
            UserRoles::class,
            'role_id',
            'id');
    }

    /**
     * A user may only belong to one company
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(
            CompanyLocations::class,
            'company_location_id',
            'id');
    }

    /**
     * TEST FUNCTION ONLY
     */



}
