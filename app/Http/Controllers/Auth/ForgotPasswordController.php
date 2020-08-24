<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\password_resets;
use App\Models\Auth\User;
use App\Modules\Backend\Auth\PasswordResets\Repositories\PasswordResetsRepository;
use App\Modules\Backend\Authentication\User\Repositories\UserRepository;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
    private $userRepository,$log,$passwordResetsRepository;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $userRepository
     * @param Log $log
     * @param PasswordResetsRepository $passwordResetsRepository
     */
    public function __construct( UserRepository $userRepository,Log $log,PasswordResetsRepository $passwordResetsRepository)
    {
        $this->userRepository=$userRepository;
        $this->log=$log;
        $this->passwordResetsRepository=$passwordResetsRepository;
        $this->middleware('guest');
    }

    public function reset(Request $request)
    {
        $user = $this->userRepository->getAll()->where('email','=',$request->email);
//Check if the user exists
        if (count($user) < 1) {
            return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }

//Create Password Reset Token
        $password_resets=new password_resets();
        $password_resets->email = $request->email;
        $password_resets->token = str_random(60);
        $password_resets->save();

//Get the token just created above
        $tokenData = $this->passwordResetsRepository->getAll()->where('email','=',$request->email)->first();

        if ($this->sendResetLinkEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }
    }

    private function sendResetLinkEmail($email, $token)
    {
        $user =$this->userRepository->getAll()->where('email','=',$email)->first();
        $link = config('base_url').'password/reset/'.$token;
        try {
                $to_name = $user['name'];
                $to_email = $email;
                $from_name = "fmtc";
                $password_reset_link = $link;
                $from_email = 'fmtc@email.com';
            /** @var TYPE_NAME $user */
            $data = array('name' => $to_name, "body" => $password_reset_link);
                Mail::send('emails.mail', $data, function ($message) use ($from_email, $to_name, $to_email, $from_name) {
                    $message->to($to_email, $to_name)->subject('Reset From');
                    $message->from($from_email, $from_name);
                });
                return true;

        } catch (\Exception $e){
                $this->log->error('Mail has not send :'.$e->getMessage());
                session()->flash('danger','Oops! Somethings went wrong');
                return redirect()->back();
            }

    }






}
