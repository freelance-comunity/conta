<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Calendar;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CalendarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $calendar = Calendar::all();

        return view('backEnd.admin.calendar.index', compact('calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required', ]);

        Calendar::create($request->all());

        Session::flash('message', 'Calendar added!');
        Session::flash('status', 'success');

        return redirect('admin/calendar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show($id)
    {
        $calendar = Calendar::findOrFail($id);

        return view('backEnd.admin.calendar.show', compact('calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $calendar = Calendar::findOrFail($id);

        return view('backEnd.admin.calendar.edit', compact('calendar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, ['body' => 'required', ]);

        $calendar = Calendar::findOrFail($id);
        $calendar->update($request->all());

        Session::flash('message', 'Calendar updated!');
        Session::flash('status', 'success');

        return redirect('admin/calendar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $calendar = Calendar::findOrFail($id);

        $calendar->delete();

        Session::flash('message', 'Calendar deleted!');
        Session::flash('status', 'success');

        return redirect('admin/calendar');
    }

}
