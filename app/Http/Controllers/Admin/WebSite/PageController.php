<?php

namespace App\Http\Controllers\Admin\WebSite;

use App\Http\Controllers\Admin\BaseController;
use App\Modules\Backend\Website\Page\Repositories\PageRepository;
use App\Modules\Backend\Website\Page\Requests\CreatePageRequest;
use App\Modules\Backend\Website\Page\Requests\UpdatePageRequest;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PageController extends BaseController
{
    private $pageRepository, $log;

    /**
     * PermissionController constructor.
     * @param Log $log
     * @param pageRepository $pageRepository
     */

    public function __construct(Log $log, PageRepository $pageRepository )
    {
        $this->pageRepository = $pageRepository;
        $this->log = $log;
        parent::__construct();
    }

    /**
     * View all entities
     * @return mixed
     */
    public function index()
    {
        $this->authorize('read', $this->pageRepository->getModel());
        if(\request()->ajax()) {
            $pages = $this->pageRepository->getAllForDataTable();
            return DataTables::of($pages)
                ->addColumn('action', function ($page) {
                    $data = $page;
                    $name = 'dashboard.pages';
                    $view = true;
                    return $this->view('partials.common.action', compact('data', 'name', 'view'))->render();
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->make(true);

        }
        return $this->view('web-site.page.index');
    }

    /**
     * Create new entity
     * @return mixed
     */
    public function create()
    {
        $this->authorize('create', $this->pageRepository->getModel());
        return $this->view('web-site.page.create');
    }

    /**
     * @param CreatePageRequest $createPageRequest
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(CreatePageRequest $createPageRequest)
    {
        $this->authorize('create', $this->pageRepository->getModel());
        $data = $createPageRequest->all();
        try {
            $page = $this->pageRepository->create($data);
            if($page == false)
            {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Page created successfully');
            return redirect()->route('dashboard.pages.index');
        }
        catch (\Exception $e) {
            $this->log->error('Page create : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $this->authorize('read', $this->pageRepository->getModel());
        $page = $this->pageRepository->findById($id);
        return $this->view('web-site.page.show', compact('page'));
    }


    /**
     * Edit entity
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $this->authorize('update', $this->pageRepository->getModel());
        $page = $this->pageRepository->findById($id);
        return $this->view('web-site.page.edit', compact('page'));
    }

    /**
     * @param UpdatePageRequest $updatePageRequest
     * @param $id
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePageRequest $updatePageRequest, $id)
    {
        $this->authorize('update', $this->pageRepository->getModel());
        $data = $updatePageRequest->all();
        try {
            $page = $this->pageRepository->update($data, $id);
            if($page == false)
            {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Page updated successfully');
            return redirect()->route('dashboard.pages.index');
        }
        catch (\Exception $e) {
            $this->log->error('Page update : '.$e->getMessage());
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
        $this->authorize('delete', $this->pageRepository->getModel());
        try {
            if(isset($request->hard_delete))
                $this->pageRepository->hardDelete($id);
            else
                $this->pageRepository->delete($id);
            session()->flash('success', 'Page deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error('Page delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }
}
