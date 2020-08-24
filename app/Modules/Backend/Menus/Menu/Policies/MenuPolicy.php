<?php

namespace App\Modules\Backend\Menus\Menus\Policies;

use App\Models\Auth\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
{
    use HandlesAuthorization;
    protected $common_permission='menu-';

    /**
     * Checks the user permission to READ site settings
     * @param User $user
     * @return bool
     */
    public function read(User $user)
    {
        if($user->can($this->common_permission.'read') || $user->can($this->common_permission.'read')) {
            return true;
        }
        return false;
    }


    /**
     * Checks the user permission to CREATE site settings
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        if($user->can($this->common_permission.'create') || $user->can($this->common_permission.'create')) {
            return true;
        }
        return false;
    }
    /**
     * Checks the user permission to UPDATE site settings
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
        if($user->can($this->common_permission.'update') || $user->can($this->common_permission.'update')) {
            return true;
        }
        return false;
    }

    /**
     * Checks the user permission to DELETE site settings
     * @param User $user
     * @return bool
     */
    public function delete(User $user)
    {
        if($user->can($this->common_permission.'delete') || $user->can($this->common_permission.'delete')) {
            return true;
        }
        return false;
    }
}
