<?php
/**
 * Created by PhpStorm.
 * User: Prabin Bajracharya
 * Date: 2/14/2018
 * Time: 11:18 AM
 */

namespace App\Modules\Backend\Menus\Menu\Repositories;

use App\Modules\Framework\Repository;

interface MenuRepository extends Repository
{
    /*
       *params array(array school data)
     * return collection
         */
    public function createSchoolWithDetails(array $data);

    /*
   *params array (array school Input)
     * params int id
    * return collection
   */
    public function updateSchoolWithDetails(array $data, $id);
    /*
     * return collection
     */
    public function getParentDisciplinesList();

}

