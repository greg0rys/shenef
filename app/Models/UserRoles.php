<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserRoles extends Model
{
    /** @use HasFactory<\Database\Factories\UserRolesFactory> */
    use HasFactory;

    protected $table = 'role_user';
    protected $fillable = [
        'name'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    public function makeRole(string $role_name): bool
    {
        $roll = new UserRoles();
        $roll->name = $role_name;
        return $roll->save();

    }
}
