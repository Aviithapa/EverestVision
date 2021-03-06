<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 3/10/2018
 * Time: 05:09 AM
 */

namespace App\Modules\Backend\Website\Post\Repositories;

use App\Models\Website\Post;
use App\Modules\Framework\RepositoryImplementation;

class EloquentPostRepository extends RepositoryImplementation implements PostRepository
{
    protected $entity_name = "Post";

    /**
     * Gets model for operation.
     *
     * @return mixed
     */
    public function getModel()
    {
        return new Post();
    }

    public function getData($limit, $offset = 0)
    {
        return $this->getModel()
            ->where(function ($query) use ($limit, $offset) {

            })
            ->take($limit)
            ->get();

    }
    public function allPartnersList()
    {
        return $this->getModel()
        ->where('type','=','school_partner')
            ->orWhere('type','=','recruiter_partner')
            ->orWhere('type','=','student_partner')
            ->orWhere('type','=','teacher')
            ->get();

    }
    public function allServiceType()
    {
        return $this->getModel()
        ->where('type','=','services')
//            ->orWhere('type','=','recruiter_partner_service')
//            ->orWhere('type','=','student_partner_service')
            ->get();

    }
    public function findMultipleParameter($type,$meta_data,$limit,$sortColumn='id',$orderBy='desc',$paginate=false){
        if($limit!=null){
            return $this->getModel()->where('type',$type)
                ->where('meta_data',$meta_data)->limit($limit)->orderBy($sortColumn,$orderBy)->get();
        }
        if(!$paginate){
            return $this->getModel()->where('type',$type)
                ->where('meta_data',$meta_data)->orderBy($sortColumn,$orderBy)->get();
        }
        return $this->getModel()->where('type',$type)
            ->where('meta_data',$meta_data)->orderBy($sortColumn,$orderBy)->paginate($paginate);
    }

}

