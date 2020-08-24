<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Backend\Auth\PasswordResets\Repositories\PasswordResetsRepository;
use App\Modules\Backend\Authentication\User\Repositories\UserRepository;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * @var UserRepository
     */
    private $userRepository,$log,$passwordResetsRepository;

    /**
     * Create a new controller instance.
     *
     * @param UserRepository $userRepository
     * @param Log $log
     * @param PasswordResetsRepository $passwordResetsRepository
     */
    public function __construct(UserRepository $userRepository,Log $log,PasswordResetsRepository $passwordResetsRepository)
    {
        $this->userRepository=$userRepository;
        $this->log=$log;
        $this->passwordResetsRepository=$passwordResetsRepository;
        $this->middleware('guest');
    }

    public function resetPassword(Request $request)
    {
        //Validate input

        $this->validate(request(), [
            'email' => 'required|exists:users,email',
            'password' => 'required|confirmed'
        ]);


        $password = $request->password;

        $tokenData = $this->passwordResetsRepository->getAll()->where('token','=',$request->token)->first();

        if (!$tokenData)
            return view('auth.passwords.email');

        $user =$this->userRepository->getAll()->where('email','=',$tokenData['email'])->first();

        if (!$user)
            return redirect()->back()->withErrors(['email' => 'Email not found']);

        $user->password = Hash::make($password);
        $user->save();

        Auth::login($user);

        $this->passwordResetsRepository->delete($tokenData['id']);

        return view('login');



    }

}
