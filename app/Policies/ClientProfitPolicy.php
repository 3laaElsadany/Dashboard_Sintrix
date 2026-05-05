<?php

namespace App\Policies;

use App\Models\ClientProfit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientProfitPolicy
{
    use HandlesAuthorization;

    /**
     * تنفيذ قبل أي check آخر
     * يسمح للـ super_admin بالوصول لكل شيء
     */
    public function before(User $user, string $ability)
    {
        if ($user->role === 'super_admin') {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false; // أي حد غير السوبر أدمن لا يرى أي شيء
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ClientProfit $clientProfit): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ClientProfit $clientProfit): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ClientProfit $clientProfit): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ClientProfit $clientProfit): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ClientProfit $clientProfit): bool
    {
        return false;
    }
}