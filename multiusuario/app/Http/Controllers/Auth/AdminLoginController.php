<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $auth = Auth::guard('admin')->attempt($credentials, $request->remember);

        if ($auth) {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back($request->only('email', 'remember'));
    }

    public function index()
    {
        return view('auth.admin-login');
    }
}
