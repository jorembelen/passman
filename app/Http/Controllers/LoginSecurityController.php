<?php

namespace App\Http\Controllers;

use App\Models\LoginSecurity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginSecurityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function disable()
    {
       return view('google2fa.disable-2fa');
    }

    /**
     * Show 2FA Setting form
     */
    public function show2faForm(Request $request){
        $user = auth()->user();
        $google2fa_url = "";
        $secret_key = "";

        if($user->loginSecurity()->exists()){
            $google2fa = app('pragmarx.google2fa');
            $google2fa_url = $google2fa->getQRCodeInline(
                config('app.name'),
                $user->email,
                $user->loginSecurity->google2fa_secret
            );
            $secret_key = $user->loginSecurity->google2fa_secret;
        }

        $data = array(
            'user' => $user,
            'secret' => $secret_key,
            'google2fa_url' => $google2fa_url
        );

        return view('auth.2fa_settings')->with('data', $data);
    }

    /**
     * Generate 2FA secret key
     */
    public function generate2faSecret(Request $request){
        $user = auth()->user();
        // Initialise the 2FA class
        $google2fa = app('pragmarx.google2fa');

        // Add the secret key to the registration data
        $login_security = LoginSecurity::firstOrNew(array('user_id' => $user->id));
        $login_security->user_id = $user->id;
        $login_security->google2fa_enable = 0;
        $login_security->google2fa_secret = $google2fa->generateSecretKey();
        $login_security->save();

        return redirect('/2fa')->with('success',"Secret key is generated.");
    }

    /**
     * Enable 2FA
     */
    public function enable2fa(Request $request){
        // Create an Imagick object
        $user = auth()->user();
        $google2fa = app('pragmarx.google2fa');

        $secret = $request->input('secret');
        $valid = $google2fa->verifyKey($user->loginSecurity->google2fa_secret, $secret);


        if($valid){
            $user->loginSecurity->google2fa_enable = 1;
            $user->loginSecurity->save();
            return redirect('/')->with('success',"2FA is enabled successfully.");
        }else{
            return redirect('2fa')->with('error',"Invalid verification Code, Please try again.");
        }
    }

    /**
     * Disable 2FA
     */
    public function disable2fa(Request $request){
        // return $request->get('current-password');
        if ((Hash::check($request->get('current-password'), auth()->user()->password))) {
            // The passwords matches
            $validatedData = $request->validate([
                'current-password' => 'required',
            ]);
            $user = auth()->user();
            $user->loginSecurity->google2fa_enable = 0;
            $user->loginSecurity->save();
            return redirect('/')->with('success',"2FA is now disabled.");
        }else{
            session()->flash('error', "Your password does not matches with your account password. Please try again.");
            return redirect()->back();
        }

    }
}
