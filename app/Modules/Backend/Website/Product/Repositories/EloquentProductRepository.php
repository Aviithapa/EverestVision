<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 3/10/2018
 * Time: 05:09 AM
 */

namespace App\Modules\Backend\Website\Product\Repositories;

use App\Models\Website\Product;
use App\Modules\Framework\RepositoryImplementation;

class EloquentProductRepository extends RepositoryImplementation implements ProductRepository
{
    protected $entity_name = "Product";
    private $paginate=12;

    /**
     * Gets model for operation.
     *
     * @return mixed
     */
    public function getModel()
    {
        return new Product();
    }
    public function getDataWithPagination($limit=null)
    {
        if($limit)
            return $this->getModel()->latest()->paginate($limit);
        return $this->getModel()->latest()->paginate($this->paginate);

    }


}

