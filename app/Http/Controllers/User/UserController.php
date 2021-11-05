<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

/**
 *
 */
class UserController extends Controller
{
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
    }

    /**
     * Display the specified resource.
     *
     * @return Renderable
     */
    public function showSettings(): Renderable
    {
        $username = $this->request->user()->username;
        return view('pages.user.settings', compact('username'));
    }

    public function destroy()
    {
        $user = $this->request->user();
        $user->delete();
        return app()->call('\App\Http\Controllers\Auth\LoginController@logout');
    }
}
