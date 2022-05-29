<?php

namespace App\Http\Controllers;

use App\Models\Account;
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
        $totalAccounts = Account::query()->pluck('id')->count();

        return view('home', compact('totalAccounts'));
    }


}
