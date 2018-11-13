<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Auth;
use App\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required'
        ]);

        $hasher = app()->make('hash');
        $password = $hasher->make($request->input('password'));

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => $password,
        ]);

        return response()->json([
            'status' => 'success',
            'result' => $user
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $hasher = app()->make('hash');

        $email = $request->input('email');
        $password = $request->input('password');
        $login = User::where('email', $email)->first();

        if ( ! $login) {
            return response()->json([
                'status'  => 'fail',
                'message' => 'Your email or password incorrect.'
            ]);

        } else {
            if ($hasher->check($password, $login->password)) {
                $api_token = sha1(time());
                $create_token = User::where('id', $login->id)->update(['api_token' => $api_token]);

                if ($create_token) {
                    return response()->json([
                        'status'    => 'success',
                        'api_token' => $api_token
                    ]);
                }

            } else {
                return response()->json([
                    'status'  => 'fail',
                    'message' => 'Your email or password incorrect.'
                ]);
            }
        }
    }

    public function profile()
    {
        $user = Auth::user();

        return response()->json([
            'status' => 'success',
            'result' => $user
        ]);
    }
}
