<?php

namespace App\Http\Controllers\Web\General;

use App\Http\Controllers\Web\BaseController;
use App\Models\Menus\Menu;
use App\Models\Website\StoreRequestQuote;
use App\Modules\Backend\Authentication\Role\Repositories\RoleRepository;
use App\Modules\Backend\Authentication\User\Repositories\UserRepository;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use App\Modules\Backend\Website\Product\Repositories\ProductRepository;
use App\Modules\Frontend\Website\Slider\Repositories\SliderRepository;
use http\Exception\UnexpectedValueException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\PostDec;
use Auth;
use App;
use Carbon\Carbon;
use Session;
use App\Modules\Backend\Settings\Branch\Repositories\BranchRepository;
use App\Models\Website\feedback;
use App\Models\Website\Captcha;
use App\Modules\Backend\Settings\Province\Repositories\ProvinceRepository;
use App\Modules\Backend\Settings\StockSales\Repositories\StockSalesRepository;
use App\Modules\Backend\Settings\Purchases\Repositories\PurchasesRepository;
use App\Modules\Backend\Settings\District\Repositories\DistrictRepository;

class HomeController extends BaseController
{
    private $sliderRepository, $view_data, $postRepository, $menu;
    private $schoolProgramRepository, $goodPriceRepository;
    private $roleRepository;
    private $userRepository;
    private $request;


    public function __construct(SliderRepository $sliderRepository,
                                PostRepository $postRepository,
                                RoleRepository $roleRepository,
                                UserRepository $userRepository,
                                Request $request,
                                Menu $menu
                                )
    {
        $this->sliderRepository = $sliderRepository;
        $this->postRepository = $postRepository;
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;

        $this->request = $request;

        $this->menu = $menu;

        $this->middleware(function ($request, $next) {
            $this->view_data['locale'] = session()->get('locale');
            App::setLocale($this->view_data['locale'] ? $this->view_data['locale'] : 'np');
            return $next($request);
        });
        parent::__construct();
    }

    public function index()
    {
        return view('web.pages.index');
    }

    public function resetPasswordWithCode($code)
    {
        $isUser = false;
        if ($code === '' && $code === null) {
            $isUser = false;
        }
        $user = $this->userRepository->findByFirst('password_change_code', $code, '=');
        if ($user) {
            $isUser = true;
        }

        return view('auth.changePassword', compact('user', 'isUser', 'code'));

    }

    public function resetPasswordStore()
    {
        try {
            $user = $this->userRepository->findByFirst('password_change_code', $this->request->code, '=');
            $data['password'] = bcrypt($this->request->password);
            $userData = $this->userRepository->update($data, $user->id);
//            $this->sendResetLinkEmail($request);
            session()->flash('success', 'New password has been save successfully.Please login with your credentials');
            return redirect()->route('login');

        } catch (\Exception $e) {
//            $this->log->error('User update : '.$e->getMessage());
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back();
        }


    }

    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }





    public function slug($slug = null, Request $request)
    {
//        $slug = $slug ? $slug : 'index';
//        $this->view_data['pageContent'] = $this->postRepository->findBySlug($slug, false);
//        $template = isset($this->view_data['pageContent']->template_page) && $this->view_data['pageContent']->template_page !== '' ? 'web/template/' . $this->view_data['pageContent']->template_page : 'web/pages/' . $slug;
//        $file_path = resource_path() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $template . '.blade.php';
//        $this->view_data['menus'] = $this->menu->parseTree_menus($this->menu->get_all_menus());
//        $this->view_data['page'] = $this->postRepository->findBySlug($slug, false);
//
//        if ((isset($this->view_data['pageContent']->template_page) && $this->view_data['pageContent']->template_page === 'about') || (isset($this->view_data['pageContent']->template_page) && $this->view_data['pageContent']->template_page === 'quality')) {
//            $menu = $this->menu->where('slug', '=', $this->view_data['pageContent']->template_page)->first();
//            $this->view_data['aboutData'] = $this->menu->where('parent_id', '=', $menu->id)
//                ->whereHas('postSlug')
//                ->with('postSlug')->get();
//            if ($this->view_data['pageContent']->template_page === 'quality') {
//                $this->view_data['heading'] = $this->postRepository->findById(69);
//            }
//        } elseif ((isset($this->view_data['pageContent']->template_page) && $this->view_data['pageContent']->template_page === 'tender') ||
//            isset($this->view_data['pageContent']->template_page) && $this->view_data['pageContent']->template_page === 'career') {
//            $this->view_data['templateData'] = $this->postRepository->getModel()->where('type', '=', $this->view_data['page']->template_page)
//                ->where('meta_data', '=', $this->view_data['page']->meta_data)->paginate(10);
//        } elseif (isset($this->view_data['pageContent']->template_page) && $this->view_data['pageContent']->template_page === 'gallery') {
//            $this->view_data['photoGalleries'] = $this->postRepository->findMultipleParameter('gallery', 'image', null, 'id', 'desc', 6);
//            $this->view_data['videoGalleries'] = $this->postRepository->findMultipleParameter('gallery', 'video', null, 'id', 'desc', 6);
//            $this->view_data['extraGalleries'] = $this->postRepository->findMultipleParameter('gallery', 'extra', null, 'id', 'desc', 6);
//        }
//
//        if ($this->view_data['page'] && $this->view_data['page']->type === 'pages' && file_exists($file_path))

            $slug = $slug ? $slug : 'index';
        $this->view_data['test'] = '';
        $this->view_data['services'] = $this->postRepository->findBy('type', 'services', '=', false, 3);
        $this->view_data['Subscribe'] = $this->postRepository->findById(9);
        $this->view_data['company_info'] = $this->postRepository->findById(2);
        $this->view_data['blogs'] = $this->postRepository->findBy('type', 'news', '=');
        $this->view_data['pageContent'] = $this->postRepository->findBySlug($slug, false);
        $file_path = resource_path() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'web/pages' . DIRECTORY_SEPARATOR . $slug . '.blade.php';
        if (file_exists($file_path)) {
            switch ($slug) {
                case 'index':
                    $this->view_data['banners'] = $this->postRepository->findMultipleParameter('homepage_banner', 'banner_main', 3);
                    $this->view_data['banners_bottom'] = $this->postRepository->findMultipleParameter('homepage_banner', 'banner_bottom', 3);
                    $this->view_data['category'] = $this->postRepository->findBy('type','category', "=");
                    $this->view_data['category_title'] = $this->postRepository->findBy('type','category', "=");
                    $this->view_data['services'] = $this->postRepository->findBy('type', 'services', '=', false, 3);
                    $this->view_data['upcomings'] = $this->postRepository->getModel()->whereDate('start_date','>',Carbon::now())->limit(2)->orderBy('id','desc')->get();
                    $this->view_data['runnings'] = $this->postRepository->getModel()->where('start_date','<=',Carbon::now())->where('end_date','>=',Carbon::now())->limit(2)->orderBy('id','desc')->get();
                    $this->view_data['completed'] = $this->postRepository->getModel()->whereDate('end_date','<',Carbon::now())->limit(2)->orderBy('id','desc')->get();
                    $this->view_data['gallery']= $this->postRepository->findBy('type','gallery','=');
                    break;
                case 'services':
                    $this->view_data['services'] = $this->postRepository->findBy('type', 'services', '=', false );
                    break;
                case 'portfolio':
                    $this->view_data['category_title'] = $this->postRepository->findBy('type','category', "=");
                    $this->view_data['gallery']= $this->postRepository->findBy('type','gallery','=');
                    break;
                case 'blog':
                    $this->view_data['blog']=$this->postRepository->findBy('type', 'news', '=');
                    $this->view_data['blogs']=$this->postRepository->findBy('type', 'news', '=');
                    break;
                case 'about':
                    $this->view_data['about_banner']= $this->postRepository->findById(205);
                    $this->view_data['testimonials'] = $this->postRepository->findBy('type', 'testimonial', '=');
                    $this->view_data['team'] =$this->postRepository->findBy('type','team','=');
                    $this->view_data['promote']=$this->postRepository->findById(216);
                    break;
                case 'pricing':
                    $this->view_data['package']=$this->postRepository->findBy('type','packages','=');
                    break;
                case 'blog-details':
                    $this->view_data['blog'] = $this->postRepository->findBySlug($slug, false);
                    break;

                default:
                    break;
            }
//            return 'Site under construction';
            return view('web.pages.'.$slug, $this->view_data);
        }
        // 3. No page exist (404)
        return view('web.pages.404', $this->view_data);

    }

    public function blogdetails($slug){
        $this->view_data['blog'] = $this->postRepository->findBySlug($slug, false);
        return view('web.pages.blog-details', $this->view_data);
    }








}
