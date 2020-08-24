<?php


namespace App\Modules\Backend\Auth\PasswordResets\Repositories;


use App\Models\Auth\password_resets;
use App\Modules\Framework\RepositoryImplementation;

class EloquentPasswordResetsRepository  extends RepositoryImplementation implements PasswordResetsRepository
{
    protected $entity_name = "password_resets";

    /**
     * Gets model for operation.
     *
     * @return mixed
     */
    public function getModel(){
        return new password_resets();
    }



}

