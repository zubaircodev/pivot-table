<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function userFollow(User $user)
    {
        if (auth()->user()->following->contains($user->id)){
            auth()->user()->following()->detach($user->id);
        }else{
            auth()->user()->following()->attach($user->id);
        }

        return redirect()->route('home');
    }
}
