<?php
/**
 * Created by PhpStorm.
 * User: Prabin Bajracharya
 * Date: 2/14/2018
 * Time: 11:21 AM
 */

namespace App\Modules\Backend\Menus\Menu\Repositories;

use App\Models\Menus\Menu;
use App\Modules\Framework\RepositoryImplementation;
use App\Models\Schools\School;
use DB;

class EloquentMenuRepository extends RepositoryImplementation implements  MenuRepository
{
    protected $entity_name = "Menus";

    protected $vehicleVariantImage;
    public function __construct()
    {
    }
    /**
     * Gets model for operation.
     *
     * @return mixed
     */
    public function getModel()
    {
        return new Menu();
    }

    /**
     * @param $name
     * @return mixed
     */
    public function findByName($name)
    {
        $data = $this->getModel()->where('name', $name)->first();
        return $data;
    }


    public function createSchoolWithDetails(array $data)
    {
        DB::beginTransaction();
        try {
            $entity = $this->getModel()->create($data['data']);
            DB::commit();
            return $entity;
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            $this->log->error($this->entity_name . ' create : ' . $e->getMessage());
            return false;
        }

    }

    public function updateSchoolWithDetails(array $data,$id)
    {
        DB::beginTransaction();
        try {
            $entity = $this->update($data['data'],$id);
            DB::commit();
            return $entity;
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            $this->log->error($this->entity_name . ' create : ' . $e->getMessage());
            return false;
        }

    }
    public function getParentDisciplinesList()
    {
        return Discipline::where('parent_id','=',null)->get();
    }


}

