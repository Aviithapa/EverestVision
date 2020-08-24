<?php
/**
 * Created by PhpStorm.
 * User: prabin
 * Date: 1/5/19
 * Time: 12:18 PM
 */

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Menus\Menu;
use App\Modules\Backend\Menus\Menu\Repositories\MenuRepository;
use App\Modules\Backend\Menus\Menu\Requests\CreateMenuRequest;
use App\Modules\Backend\Menus\Menu\Requests\UpdateMenuRequest;
use App\Modules\Backend\Website\Slider\Requests\UpdateSliderRequest;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Input;

class MenuController extends BaseController
{
    private  $log,$menuRepository;
    private $common_view='menu.';
    private $common_message='Menu';
    private $common_name='Menu  and Programs';
    private $common_route='dashboard.menus';

    /**
     * PermissionController constructor.
     * @param Log $log
     * @param schoolModel $schoolModel
     */

    public function __construct(Log $log,MenuRepository $menuRepository)
    {
        $this->menuRepository = $menuRepository;
        $this->log = $log;
        $this->view_data['common_route']=$this->common_route;
        $this->view_data['common_view']='admin.'.$this->common_view;
        $this->view_data['common_name']=$this->common_name;
        parent::__construct();
    }

    /**
     * View all entities
     * @return mixed
     */
    public function index()
    {
        $this->authorize('read', $this->menuRepository->getModel());
        if(\request()->ajax()) {
            $vehicles = $this->menuRepository->getAllForDataTable();
            return DataTables::of($vehicles)
                ->addColumn('action', function ($vehicle) {
                    $data = $vehicle;
                    $name = $this->common_route;
                    $view = false;
                    return $this->view('partials.common.action', compact('data', 'name', 'view'))->render();
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->make(true);

        }
        $items = Menu::orderBy('display_order')->get();
        $menus= new Menu();
        $this->view_data['menus']= $menus->getHTML($items);
        return $this->view($this->common_view.'index',$this->view_data);
    }

    /**
     * Create new entity
     * @return mixed
     */
    public function create()
    {
        $this->authorize('create', $this->menuRepository->getModel());
        return $this->view($this->common_view.'create',$this->view_data);
    }

    public function store(CreateMenuRequest $createMenuRequest)
    {
        $this->authorize('create', $this->menuRepository->getModel());
        try {
            $createMenuRequest['image']=$createMenuRequest['program_pic'];
            $isSlug=$this->menuRepository->getModel()->where('slug','=',$createMenuRequest['slug'])->first();

            if($isSlug){
                session()->flash('danger', 'Slug name has already been used please change ');
                return redirect()->back()->withInput();

            }
            $menu = $this->menuRepository->create($createMenuRequest->all());
            if($menu == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', $this->common_message.' created successfully');
            return redirect()->route($this->common_route.'.index');
        }
        catch (\Exception $e) {
            $this->log->error('Menu create : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Edit entity
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $this->authorize('update', $this->menuRepository->getModel());
        $school = $this->menuRepository->findById($id);
        return $this->view($this->common_view.'edit',$this->view_data, compact('school'));
    }

    /**
     * @param UpdateSliderRequest $updateSliderRequest
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(UpdateMenuRequest $updateMenuRequest, $id)
    {
        $this->authorize('update', $this->menuRepository->getModel());
        try {
            $updateMenuRequest['image']=$updateMenuRequest['program_pic'];
            $validate=$this->menuRepository->getAll()->where('id','=',$id)->first();
            $slug=$this->menuRepository->getAll()->where( 'slug','=',$updateMenuRequest['slug'])->first();
            if($slug['slug'] != $validate['slug']){
                $isSlug = $this->menuRepository->getModel()->where('slug', '=', $updateMenuRequest['slug'])->first();

                if($isSlug){
                    session()->flash('danger', 'Slug name has already been used please change ');
                    return redirect()->back()->withInput();
                }

            }
            $menu = $this->menuRepository->update($updateMenuRequest->all(),$id);
            if($menu == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', $this->common_message.' updated successfully');
            return redirect()->route($this->common_route.'.index');
        }
        catch (\Exception $e) {
            $this->log->error('Vehicle Type update : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request,$id)
    {
        $this->authorize('delete', $this->menuRepository->getModel());
        try {
            if(isset($request->hard_delete))
                $this->menuRepository->hardDelete($id);
            else
                $this->menuRepository->delete($id);
            session()->flash('success', $this->common_message.' deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error($this->common_message.' delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
    }
        }
    public function modalDelete(Request $request){
        $this->authorize('delete', $this->menuRepository->getModel());
        try {
            if(isset($request->hard_delete))
                $this->menuRepository->hardDelete($request->delete_id);
            else
                $this->menuRepository->delete($request->delete_id);
            session()->flash('success', $this->common_message.' deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error($this->common_message.' delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }
    public function orderDrag(Request $request){
        $source       = e($request->get('source'));
        $destination  = e($request->get('destination',0));
//          dd($destination);
        $item             = Menu::find($source);
        if($destination!=null){
            $item->parent_id  = $destination;
        }
        else{
            $item->parent_id=null;
        }
        $item->save();

        $ordering       = json_decode($request->get('order'));
        $rootOrdering   = json_decode($request->get('rootOrder'));

        if($ordering){
            foreach($ordering as $order=>$item_id){
                if($itemToOrder = Menu::find($item_id)){
                    $itemToOrder->display_order = $order;
                    $itemToOrder->save();
                }
            }
        } else {
            foreach($rootOrdering as $order=>$item_id){
                if($itemToOrder = Menu::find($item_id)){
                    $itemToOrder->display_order = $order;
                    $itemToOrder->save();
                }
            }
        }

        return 'ok ';
    }
}
