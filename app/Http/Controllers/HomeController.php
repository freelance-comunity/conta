<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pending;
use App\Calendar;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $pendings = Pending::all();
        return view('home')
        ->with('users', $users)
        ->with('pendings', $pendings);
    }

    public function calendar()
    {
      $calendars = Calendar::all();
      return view('calendar')
      ->with('calendars', $calendars);
    }
}
