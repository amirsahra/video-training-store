<?php

namespace Modules\Authentication\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Renderable
    {
        return view('authentication::index');
    }

    public function logout()
    {
        auth()->logout();
        return Redirect::route('home');
    }

    public function resetPassword(Request $request)
    {
        return view('authentication::index', ['token' => $request->token]);
    }

}
