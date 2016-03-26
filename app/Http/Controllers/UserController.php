<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Crypt;
use Auth;

class UserController extends Controller
{
    public function index(Request $request) {
        return view('index');
    }

    public function register(Request $request) {
        return view('register');
    }

    public function postRegister(Request $request) {
        $emailInput = $request->input('email');
        //$emailEncrypted = Crypt::encrypt($emailInput);

        $new_user = new User;
        $new_user->email = $emailInput;
        $new_user->active = $emailEncrypted;
        $new_user->picture = "default.png";
        $new_user->save();
        $id_encrypted = Crypt::encrypt($new_user->id);

        $this->sendConfirmationRegistrationEmail($emailInput, $id_encrypted);

        return view('register-email-successful', ['email'=>$emailInput]);
    }

    public function sendConfirmationRegistrationEmail($email, $id_encrypted) {
        $to = $email;
        $linkRgistration = action("UserController@registerContinue", [$id_encrypted]);
        $subject = "jTunnel - Registration Email Confirmation";

        $message = "
            <html>
                <head>
                    <title>jTunnel - Registration Email Confirmation</title>
                </head>
                <body>
                    <div style='color:#FFFFFF;background-color:#3f51b5;padding:10px;'>
                        jTunnel - Registration Email Confirmation
                    </div>
                    <div style='padding:20px;'>
                        To continue your registration, please <a href='$linkRgistration'>CLICK THIS LINK</a> or open this URL in a browser:<br/><br/>".$linkRgistration."
                    </div>
                </body>
            </html>
        ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <no-reply@jtunnel.therookieblog.com>' . "\r\n";

        mail($to,$subject,$message,$headers);
    }

    public function registerContinue($token) {
        //$registeredEmail = Crypt::decrypt($token);
        $registeredId = Crypt::decrypt($token);
        //$checkIfRegistered = User::where('email', $registeredEmail)->first();
        $checkIfRegistered = User::where('id', $registeredId)->first();
        if (count($checkIfRegistered) == 0) {
            return view('register-no-email-match');
        }
        return view('register-continue', ['email'=>$checkIfRegistered->email, 'id'=>$checkIfRegistered->id]);
    }

    public function postRegisterContinue(Request $request) {
        $userId = $request->input('user_id');
        $password = md5($request->input('password'));
        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');

        $update_user = User::find($userId);
        $update_user->password = $password;
        $update_user->first_name = $firstName;
        $update_user->last_name = $lastName;
        $update_user->active = 'true';
        $update_user->save();

        return view('registered-successfully-user');
    }

    public function login(Request $request) {
        return view('login');
    }

    public function postLogin(Request $request) {
        $email = $request->input('email');
        $password = md5($request->input('password'));

        $checkUser = User::where('email', $email)->where('password', $password)->first();
        if (count($checkUser) == 0) {
            return view('login-failed');
        }
        Auth::loginUsingId($checkUser->id);

        return redirect(action('UserController@index'));
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect(action('UserController@login'));
    }

    public function pricing(Request $request) {

    }

    public function installation(Request $request) {

    }

    public function contact_us(Request $request) {

    }

    public function about_us(Request $request) {

    }

    public function terms(Request $request) {

    }

    public function privacy(Request $request) {

    }
}
