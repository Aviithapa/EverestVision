<?php

namespace App\Http\Controllers\Admin\WebSite;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Website\Post;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Post\Requests\CreatePostRequest;
use App\Modules\Backend\Website\Post\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Contracts\Logging\Log;

class PostController extends BaseController
{
    private $postRepository, $log;
    public function __construct(Log $log, PostRepository $postRepository )
    {
        $this->postRepository = $postRepository;
        $this->log = $log;
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read', $this->postRepository->getModel());
        if(\request()->ajax()) {
            $posts = $this->postRepository->findByDataTable('type','content','=');
            return DataTables::of($posts)
                ->addColumn('action', function ($post) {
                    $data = $post;
                    $name = 'dashboard.posts';
                    $view = false;
                    return $this->view('partials.common.action', compact('data', 'name', 'view'))->render();
                })
                ->editColumn('post_pic', function ($post) {
                    $url=asset($post->getPostImage());
                    return '<img src='.$url.' border="0" width="40"  />';
//                        return '<img src="'.asset($banner->getImage()).'" border="0" width="40" class="img-rounded" align="center" />';
                })
                ->editColumn('id', 'ID: {{$id}}')
                ->rawColumns(['post_pic', 'action'])
                ->make(true);

        }
        return $this->view('web-site.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $this->postRepository->getModel());
        return $this->view('web-site.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $createPostRequest)
    {
        $this->authorize('create', $this->postRepository->getModel());

        $data = $createPostRequest->all();
        $data['image_id']=$data['post_pic'];
        try {
            $isSlug=$this->postRepository->getModel()->where('slug','=',$createPostRequest['slug'])->first();

            if($isSlug){
                session()->flash('danger', 'Slug name has already been used please change ');
                return redirect()->back()->withInput();

            }
            $post = $this->postRepository->create($data);
            if($post == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Post created successfully');
            return redirect()->route('dashboard.posts.index');
        }
        catch (\Exception $e) {
            $this->log->error('Post create : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', $this->postRepository->getModel());
        $post = $this->postRepository->findById($id);
        return $this->view('web-site.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $updatePostRequest, $id)
    {
        $this->authorize('update', $this->postRepository->getModel());

        $data = $updatePostRequest->all();
        $data['image_id']=$data['post_pic'];
        try {
            $validate=$this->postRepository->getAll()->where('id','=',$id)->first();
            $slug=$this->postRepository->getAll()->where( 'slug','=',$updatePostRequest['slug'])->first();
            if($slug['slug'] != $validate['slug']){
                $isSlug = $this->postRepository->getModel()->where('slug', '=', $updatePostRequest['slug'])->first();

                if($isSlug){
                    session()->flash('danger', 'Slug name has already been used please change ');
                    return redirect()->back()->withInput();
                }

            }
            $post = $this->postRepository->update($data, $id);
            if($post == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Post updated successfully');
            return redirect()->route('dashboard.posts.index');
        }
        catch (\Exception $e) {
            $this->log->error('Post update : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Website\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', $this->postRepository->getModel());
        try {
            if(isset($request->hard_delete))
                $this->postRepository->hardDelete($id);
            else
                $this->postRepository->delete($id);
            session()->flash('success', 'Post deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            $this->log->error('Post delete : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }
    }
}
