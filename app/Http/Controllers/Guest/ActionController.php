<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Auth;
use Validator;
// Models //
use App\Models\Client;
// Mailables //
use App\Mail\Client\RegistrationEmail;

class ActionController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'     =>  ['bail', 'required', 'email', 'unique:clients'],
            'password'  =>  ['bail', 'required', 'confirmed', 'min:8'],
            'fullName'  =>  ['bail', 'required']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $client = Client::create([
            'uuid'          => (string) Str::uuid(),
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
            'fullName'      => $request->fullName,
            'activationKey' => (string) Str::uuid()
        ]);
        return response()->json(['response' => 'Success']);
    }

    public function verify($uuid, $activationKey) {
        $client = Client::where('uuid', $uuid)->first();
        if(empty($client) || $client->activationKey != $activationKey) {
            return response()->json(['response' => 'Wrong activation credentials.']);
        }
        $client->update(['activationKey' => null]);
        Auth::loginUsingId($client->id);
        return redirect('/dashboard');
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'     => ['bail', 'required', 'email'],
            'password'  => ['bail', 'required', 'min:8']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if(empty(Auth::user()->activationKey)) {
                Auth::logout();
                return response()->json(['response' => 'Your account is not activated. Please, check your email for more information.']);
            }
            return response()->json(['response' => 'Success']);
        }
        return response()->json(['response' => 'Wrong e-mail or password.']);
    }

    public function adminLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'     => ['bail', 'required', 'email'],
            'password'  => ['bail', 'required', 'min:8']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        if(Auth::attempt(['email' => $request->email, 'password' => bcrypt($request->password)], true)) {
            return response()->json(['response' => 'Success']);
        }
        return response()->json(['response' => 'Wrong login credentials.']);
    }
}
