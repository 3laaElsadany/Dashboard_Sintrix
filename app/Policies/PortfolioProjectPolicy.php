<?php

namespace App\Policies;

use App\Models\PortfolioProject;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PortfolioProjectPolicy
{
    use HandlesAuthorization;

    /**
     * تنفيذ قبل أي check آخر
     * يسمح للـ admin والـ super_admin بالوصول لكل شيء
     */
    public function before(User $user, string $ability)
    {
        if (in_array($user->role, ['admin', 'super_admin'])) {
            return true; // admin و super_admin يمكنهم كل شيء
        }
    }

    public function viewAny(User $user): bool
    {
        return false; // أي مستخدم آخر لا يرى أي شيء
    }

    public function view(User $user, PortfolioProject $portfolioProject): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, PortfolioProject $portfolioProject): bool
    {
        return false;
    }

    public function delete(User $user, PortfolioProject $portfolioProject): bool
    {
        return false;
    }

    public function restore(User $user, PortfolioProject $portfolioProject): bool
    {
        return false;
    }

    public function forceDelete(User $user, PortfolioProject $portfolioProject): bool
    {
        return false;
    }
}
