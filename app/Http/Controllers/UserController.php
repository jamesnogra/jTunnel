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

        $new_user = new User;
        $new_user->email = $emailInput;
        $new_user->active = Crypt::encrypt($emailInput);
        $new_user->picture = "default.png";
        $new_user->save();

        return view('register-email-successful', ['email'=>$emailInput]);
    }

    public function registerContinue($token) {
        $registeredEmail = Crypt::decrypt($token);
        $checkIfRegistered = User::where('email', $registeredEmail)->first();
        if (count($checkIfRegistered) == 0) {
            return view('register-no-email-match');
        }
        return view('register-continue', ['email'=>$registeredEmail, 'id'=>$checkIfRegistered->id]);
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