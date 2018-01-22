<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Pending;
use App\Calendar;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

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
        $pendings = Pending::where('status', 'EN PROCESO');
        $terminates = Pending::where('status', 'TERMINADO');
        return view('home')
        ->with('users', $users)
        ->with('pendings', $pendings)
        ->with('terminates', $terminates);
    }

    public function calendar()
    {
        $calendars = Calendar::all();
        return view('calendar')
      ->with('calendars', $calendars);
    }

    public function createEvent()
    {
        $event = new Event;

        $event->name = 'A new event';
        $event->startDateTime = Carbon::now();
        $event->endDateTime = Carbon::now()->addHour();

        $event->save();
    }
}
