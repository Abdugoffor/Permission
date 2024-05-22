<?php

namespace Kadirov\RolePermission;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait RoleTrait
{
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_users', 'user_id', 'role_id')
            ->withTimestamps();
    }
    public function hasPermission($permission)
    {
        return $this->roles()->whereHas('permissions', function ($query) use ($permission) {
            $query->where('key', $permission);
        })->exists();
    }
}