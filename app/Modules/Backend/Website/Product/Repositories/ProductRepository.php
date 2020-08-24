<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 3/10/2018
 * Time: 05:05 AM
 */

namespace App\Modules\Backend\Website\Product\Repositories;

use App\Modules\Framework\Repository;

interface ProductRepository extends Repository
{
    /**
     * @return mixed
     */
    public function getDataWithPagination($limit);
}

