<?php
/**
 * Created by PhpStorm.
 * User: Saurav KC
 * Date: 3/10/2018
 * Time: 05:11 AM
 */


namespace App\Modules\Backend\Menus\Menu\Requests;

use App\Modules\Framework\Request;

class UpdateMenuRequest extends Request
{

    public function rules()
    {
        return [
//            'display_order'=>'required',
//            'vehicle_sub_type_id'=>'required'
        ];
    }
}
