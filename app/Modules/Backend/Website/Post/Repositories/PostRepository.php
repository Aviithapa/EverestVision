<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 3/10/2018
 * Time: 05:05 AM
 */

namespace App\Modules\Backend\Website\Post\Repositories;

use App\Modules\Framework\Repository;

interface PostRepository extends Repository
{
    /*
              *params integer limit
         * params integer offset
            * return collection
                */
    public function getData($limit, $offset = 0);
    public function findMultipleParameter($type,$meta_data,$limit,$sortColumn,$orderBy,$paginate);

    public function allPartnersList();

    public function allServiceType();

}

