<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pending;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use App\Person;
use DB;
use App\People;
use App\User;
use App\Tracing;
use PDF;

class PendingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pending = Pending::all();

        return view('backEnd.admin.pending.index', compact('pending'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //$peoples = Person::pluck(['name', 'last_name'], 'id');
        $peoples = Person::select(
            DB::raw("CONCAT(name,' ',last_name) AS name"),
            'id'
        )
            ->pluck('name', 'id');

        return view('backEnd.admin.pending.create')
        ->with('peoples', $peoples);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['owner' => 'required', 'affair' => 'required', ]);
        $people = Person::findOrFail($request->input('owner'));
        $input = $request->all();
        $input['owner'] = $people->name.' '.$people->last_name;
        $input['people_id'] = $people->id;

        Pending::create($input);

        Session::flash('message', 'Caso agregado.');
        Session::flash('status', 'success');

        return redirect('admin/pending');
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
        $pending = Pending::findOrFail($id);
        $peoples = User::pluck('name', 'id');
        $tracings = $pending->tracings;

        return view('backEnd.admin.pending.show', compact('pending', 'peoples', 'tracings'));
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
        $pending = Pending::findOrFail($id);
        $peoples = Person::select(
            DB::raw("CONCAT(name,' ',last_name) AS name"),
            'id'
        )
            ->pluck('name', 'id');
        return view('backEnd.admin.pending.edit', compact('pending', 'peoples'));
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
        $this->validate($request, ['owner' => 'required', 'affair' => 'required', ]);

        $pending = Pending::findOrFail($id);
        $pending->update($request->all());

        Session::flash('message', 'Caso actualizado.');
        Session::flash('status', 'success');

        return redirect('admin/pending');
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
        $pending = Pending::findOrFail($id);

        $pending->delete();

        Session::flash('message', 'Caso eliminado.');
        Session::flash('status', 'success');

        return redirect('admin/pending');
    }

    public function terminatePending($id)
    {
        $pending = Pending::findOrFail($id);
        $pending->status = 'TERMINADO';
        $pending->save();

        Session::flash('message', 'Caso terminado.');
        Session::flash('status', 'success');

        return redirect()->back();
    }

    public function pdf($id)
    {
        $pending = Pending::findOrFail($id);
        $tracings = $pending->tracings;

        $pdf = PDF::loadView('backEnd.admin.pending.pdf', compact('pending', 'tracings'))->setPaper('a4', 'landscape');
        return $pdf->download('reporte.pdf');
    }
}
