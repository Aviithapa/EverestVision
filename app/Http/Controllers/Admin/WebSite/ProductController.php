<?php

namespace App\Http\Controllers\Admin\WebSite;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Website\Product;
use App\Modules\Backend\Website\Product\Repositories\ProductRepository;
use App\Modules\Backend\Website\Product\Requests\CreateProductRequest;
use App\Modules\Backend\Website\Product\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Logging\Log;

class ProductController extends BaseController
{
    private $productRepository, $log;
    private $viewData;
    private $commonRoute='dashboard.products';
    private $commonView='web-site.product.';
    private $commonMessage='Products';
    private $type='products';
    public function __construct(Log $log, ProductRepository $productRepository )
    {
        $this->productRepository = $productRepository;
        $this->log = $log;
        $this->viewData['commonRoute']=$this->commonRoute;
        $this->viewData['commonView']=$this->commonView;
        $this->viewData['commonMessage']=$this->commonMessage;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read', $this->productRepository->getModel());
        if(\request()->ajax()) {
            $partners = $this->productRepository->getAllForDataTable();
            return DataTables::of($partners)
                ->editColumn('action', function ($partner) {
                    $data = $partner;
                    $name = $this->commonRoute;
                    $view = false;
                    return $this->view('partials.common.action', compact('data', 'name', 'view'));
                })
                ->editColumn('partner_pic', function ($partner) {
                    $url=asset($partner->getImage());
                    return '<img src='.$url.' border="0" width="40"  />';
//                        return '<img src="'.asset($partner->getImage()).'" border="0" width="40" class="img-rounded" align="center" />';
                })
                ->editColumn('id', 'ID: {{$id}}')
//                    ->rawColumns(['partner_image'])
                ->rawColumns(['partner_pic', 'action'])
                ->make(true);

        }
        return $this->view($this->commonView.'index',$this->viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $this->productRepository->getModel());
        return $this->view($this->commonView.'create',$this->viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $createProductRequest)
    {
        $this->authorize('create', $this->productRepository->getModel());
        $data = $createProductRequest->all();
//        $data['image']=$data['partner_pic'];
        try {
            $partner = $this->productRepository->create($data);
            if($partner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', $this->commonMessage.' created successfully');
            return redirect()->route($this->commonRoute.'.index');
        }
        catch (\Exception $e) {
            $this->log->error('Teacher create : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', $this->productRepository->getModel());
        $partner = $this->productRepository->findById($id);
        return $this->view($this->commonView.   '.edit',$this->viewData, compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $updateProductRequest, $id)
    {
        $this->authorize('update', $this->productRepository->getModel());
        $data = $updateProductRequest->all();
//        $data['image']=$data['partner_pic'];
        try {
            $banner = $this->productRepository->update($data, $id);
            if($banner == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', $this->commonMessage.' updated successfully');
            return redirect()->route($this->commonRoute.'.index');
        }
        catch (\Exception $e) {
            $this->log->error('Teacher update : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $this->productRepository->getModel());
        try {
            if(isset($request->hard_delete))
                $this->productRepository->hardDelete($id);
            else
                $this->productRepository->delete($id);
            session()->flash('success', $this->commonView.' deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error('Teacher delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }
}
