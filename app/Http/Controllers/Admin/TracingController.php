<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Tracing;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\User;
use App\Pending;
use Jenssegers\Date\Date;

class TracingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tracing = Tracing::all();

        return view('backEnd.admin.tracing.index', compact('tracing'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.tracing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required', 'people' => 'required', 'type' => 'required', ]);
        $pending = Pending::findOrFail($request->input('pending_id'));

        $input = $request->all();
        $people = User::findOrFail($request->input('people'));
        $input['people'] = $people->name;
        Tracing::create($input);

        $peoples = User::pluck('name', 'id');
        $tracings = $pending->tracings;

        return view('backEnd.admin.pending.show', compact('pending', 'peoples', 'tracings'));
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
        $tracing = Tracing::findOrFail($id);

        return view('backEnd.admin.tracing.show', compact('tracing'));
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
        $tracing = Tracing::findOrFail($id);

        return view('backEnd.admin.tracing.edit', compact('tracing'));
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
        $this->validate($request, ['body' => 'required', 'people' => 'required', 'type' => 'required', ]);

        $tracing = Tracing::findOrFail($id);
        $tracing->update($request->all());

        Session::flash('message', 'Tracing updated!');
        Session::flash('status', 'success');

        return redirect('admin/tracing');
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
        $tracing = Tracing::findOrFail($id);

        $tracing->delete();

        Session::flash('message', 'Elemento eliminado del historial.');
        Session::flash('status', 'success');

        return redirect()->back();
    }

}
