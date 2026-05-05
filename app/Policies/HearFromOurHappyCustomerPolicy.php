<?php

namespace App\Policies;

use App\Models\HearFromOurHappyCustomer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HearFromOurHappyCustomerPolicy
{
    use HandlesAuthorization;

    /**
     * السماح للـ admin و super_admin بكل الصلاحيات قبل أي check آخر
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

    public function view(User $user, HearFromOurHappyCustomer $model): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, HearFromOurHappyCustomer $model): bool
    {
        return false;
    }

    public function delete(User $user, HearFromOurHappyCustomer $model): bool
    {
        return false;
    }

    public function restore(User $user, HearFromOurHappyCustomer $model): bool
    {
        return false;
    }

    public function forceDelete(User $user, HearFromOurHappyCustomer $model): bool
    {
        return false;
    }
}