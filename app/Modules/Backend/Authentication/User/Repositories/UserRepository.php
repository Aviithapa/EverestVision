<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 2/14/2018
 * Time: 11:18 AM
 */

namespace App\Modules\Backend\Authentication\User\Repositories;

use App\Modules\Framework\Repository;

interface UserRepository extends  Repository
{
    /**Gets all data for data-table
     * @return mixed
     */
    public function getAllRecruitersForDataTable();
    public function getUserByBranch($name);

}

