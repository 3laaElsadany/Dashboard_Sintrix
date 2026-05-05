<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;


    /**
     * أي شخص admin أو super_admin يقدر يشوف كل الـ users
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, ['admin', 'super_admin']);
    }

    public function view(User $user, User $model): bool
    {
        return in_array($user->role, ['admin', 'super_admin']);
    }

    /**
     * إنشاء المستخدمين فقط للـ admin أو super_admin
     */
    public function create(User $user): bool
    {
        return $user->role === 'super_admin';
    }

    /**
     * التعديل فقط للـ admin أو super_admin
     */
    public function update(User $user, User $model): bool
    {
        return $user->role === 'super_admin';
    }

    /**
     * الحذف فقط للـ super_admin
     */
    public function delete(User $user, User $model): bool
    {
        return $user->role === 'super_admin';
    }

    /**
     * restore فقط للـ super_admin
     */
    public function restore(User $user, User $model): bool
    {
        return $user->role === 'super_admin';
    }

    /**
     * forceDelete فقط للـ super_admin
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->role === 'super_admin';
    }
}