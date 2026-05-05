<?php

namespace App\Policies;

use App\Models\CompanyStats;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyStatsPolicy
{
    use HandlesAuthorization;

    /**
     * تنفيذ قبل أي check آخر
     * يسمح للـ admin والـ super_admin بالوصول لكل شيء
     */
    public function before(User $user, string $ability)
    {
        if ($ability === 'create') {
            // السماح بإنشاء سجل جديد فقط لو مفيش أي سجل موجود
            if (CompanyStats::count() === 0) {
                return true; // يسمح بالإنشاء
            } else {
                return false; // يمنع إنشاء أكثر من سجل
            }
        }

        // باقي القدرات للـ admin / super_admin
        if (in_array($user->role, ['admin', 'super_admin'])) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false; // باقي المستخدمين لا يمكنهم رؤية أي شيء
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, CompanyStats $companyStat): bool
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
    public function update(User $user, CompanyStats $companyStat): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, CompanyStats $companyStat): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, CompanyStats $companyStat): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, CompanyStats $companyStat): bool
    {
        return false;
    }
}
