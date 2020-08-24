<?php


namespace App\Http\Controllers\Admin\WebSite;


use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Post\Requests\CreatePostRequest;
use App\Modules\Backend\Website\Post\Requests\UpdatePostRequest;
use App\Modules\Backend\Website\Slider\Repositories\SliderRepository;
use App\Modules\Backend\Website\Slider\Requests\CreateSliderRequest;
use App\Modules\Backend\Website\Slider\Requests\UpdateSliderRequest;
use Illuminate\Contracts\Logging\Log;
use App\Http\Controllers\Admin\BaseController;
use Yajra\DataTables\Facades\DataTables;

class CategoryController  extends BaseController
{
    private $sliderRepository, $log;
    private $postRepository;
    private $type='category';

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
            $sliders = $this->postRepository->findByDataTable('type','category','=');

            return DataTables::of($sliders)
                ->addColumn('action', function ($slider) {
                    $data = $slider;
                    $name = 'dashboard.category';
                    $view = false;
                    return $this->view('partials.common.action', compact('data', 'name', 'view'))->render();
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->make(true);

        }
        return $this->view('web-site.category.index');
    }

    /**
     * Create new entity
     * @return mixed
     */
    public function create()
    {
        $this->authorize('create', $this->postRepository->getModel());
        return $this->view('web-site.category.create');
    }

    public function store(CreatePostRequest $createPostRequest)
    {
        $this->authorize('create', $this->postRepository->getModel());
        $data = $createPostRequest->all();
        $data['image_id']=$data['post_pic'];
        try {
            $slider = $this->postRepository->create($data);
            if($slider == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Category created successfully');
            return redirect()->route('dashboard.category.index');
        }
        catch (\Exception $e) {
            $this->log->error('Category create : '.$e->getMessage());
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
        return $this->view('web-site.category.edit', compact('slider'));
    }

    /**
     * @param UpdatePostRequest $updatePostRequest
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $updatePostRequest, $id)
    {
        $this->authorize('update', $this->postRepository->getModel());
        $data = $updatePostRequest->all();
        $data['image_id']=$data['post_pic'];
        try {
            $slider = $this->postRepository->update($data, $id);
            if($slider == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Slider updated successfully');
            return redirect()->route('dashboard.category.index');
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
            session()->flash('success', 'Category deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error('Category delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }
}
