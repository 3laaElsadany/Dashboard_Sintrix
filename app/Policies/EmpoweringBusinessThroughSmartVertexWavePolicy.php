<?php

namespace App\Policies;

use App\Models\EmpoweringBusinessThroughSmartVertexWave;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpoweringBusinessThroughSmartVertexWavePolicy
{
    use HandlesAuthorization;

    /**
     * يسمح للـ admin والـ super_admin بكل شيء
     */
    public function before(User $user, string $ability)
    {
        if (in_array($user->role, ['admin', 'super_admin'])) {
            return true;
        }
    }

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, EmpoweringBusinessThroughSmartVertexWave $model): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, EmpoweringBusinessThroughSmartVertexWave $model): bool
    {
        return false;
    }

    public function delete(User $user, EmpoweringBusinessThroughSmartVertexWave $model): bool
    {
        return false;
    }

    public function restore(User $user, EmpoweringBusinessThroughSmartVertexWave $model): bool
    {
        return false;
    }

    public function forceDelete(User $user, EmpoweringBusinessThroughSmartVertexWave $model): bool
    {
        return false;
    }
}