<?php

namespace App\Http\Controllers\Admin\WebSite;

use App\Http\Controllers\Admin\BaseController;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Slider\Repositories\SliderRepository;
use App\Modules\Backend\Website\Slider\Requests\CreateSliderRequest;
use App\Modules\Backend\Website\Slider\Requests\UpdateSliderRequest;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends BaseController
{
    private $sliderRepository, $log;
    private $postRepository;
    private $type='gallery';

    /**
     * PermissionController constructor.
     * @param Log $log
     * @param sliderRepository $sliderRepository
     * @param postRepository $postRepository
     */

    public function __construct(Log $log, SliderRepository $sliderRepository,PostRepository $postRepository )
    {
        $this->sliderRepository = $sliderRepository;
        $this->postRepository =$postRepository;
        $this->log = $log;
        parent::__construct();
    }

    /**
     * View all entities
     * @return mixed
     */
    public function index()
    {
        $this->authorize('read', $this->postRepository->getModel());
        if(\request()->ajax()) {
            $sliders = $this->postRepository->findByDataTable('type',$this->type,'=');
            return DataTables::of($sliders)
                ->editColumn('action', function ($slider) {
                    $data = $slider;
                    $name = 'dashboard.sliders';
                    $view = false;
                    return $this->view('partials.common.action', compact('data', 'name', 'view'))->render();
                })
                ->editColumn('gallery', function ($slider) {
                    $url=asset($slider->getGalleryFile());
                    return '<img src='.$url.' border="0" width="40"  />';
//                        return '<img src="'.asset($banner->getImage()).'" border="0" width="40" class="img-rounded" align="center" />';
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->rawColumns(['gallery', 'action'])
                ->make(true);

        }
        return $this->view('web-site.slider.index');
    }

    /**
     * Create new entity
     * @return mixed
     */
    public function create()
    {
        $this->authorize('create', $this->postRepository->getModel());
        $this->viewData['category']=$this->postRepository->getAll()->where('type','=','category');
        return $this->view('web-site.slider.create',$this->viewData);
    }

    public function store(CreateSliderRequest $createSliderRequest)
    {
        $this->authorize('create', $this->postRepository->getModel());
        $data = $createSliderRequest->all();
        $data['image_id']=$data['gallery'];
        try {
            $slider = $this->postRepository->create($data);
            if($slider == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Slider created successfully');
            return redirect()->route('dashboard.sliders.index');
        }
        catch (\Exception $e) {
            $this->log->error('Slider create : '.$e->getMessage());
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
        $this->authorize('update', $this->postRepository->getModel());
        $slider = $this->postRepository->findById($id);
        $this->viewData['category']=$this->postRepository->getAll()->where('type','=','category');
        return $this->view('web-site.slider.edit', compact('slider'),$this->viewData);
    }

    /**
     * @param UpdateSliderRequest $updateSliderRequest
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSliderRequest $updateSliderRequest, $id)
    {
        $this->authorize('update', $this->postRepository->getModel());
        $data = $updateSliderRequest->all();
        $data['image_id']=$data['gallery'];
        try {
            $slider = $this->postRepository->update($data, $id);
            if($slider == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Slider updated successfully');
            return redirect()->route('dashboard.sliders.index');
        }
        catch (\Exception $e) {
            $this->log->error('Gallery update : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', $this->postRepository->getModel());
        try {
            if(isset($request->hard_delete))
                $this->postRepository->hardDelete($id);
            else
                $this->postRepository->delete($id);
            session()->flash('success', 'Gallery deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error('Slider delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }
}
