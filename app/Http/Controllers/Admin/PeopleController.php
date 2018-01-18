<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class PeopleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $people = Person::all();

        return view('backEnd.admin.people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.people.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required', 'last_name' => 'required', ]);

        Person::create($request->all());

        Session::flash('message', 'Persona agregada.');
        Session::flash('status', 'success');

        return redirect('admin/people');
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
        $person = Person::findOrFail($id);

        return view('backEnd.admin.people.show', compact('person'));
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
        $person = Person::findOrFail($id);

        return view('backEnd.admin.people.edit', compact('person'));
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
        $this->validate($request, ['name' => 'required', 'last_name' => 'required', ]);

        $person = Person::findOrFail($id);
        $person->update($request->all());

        Session::flash('message', 'Persona actualizada.');
        Session::flash('status', 'success');

        return redirect('admin/people');
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
        $person = Person::findOrFail($id);

        $person->delete();

        Session::flash('message', 'Persona eliminada.');
        Session::flash('status', 'success');

        return redirect('admin/people');
    }

}
