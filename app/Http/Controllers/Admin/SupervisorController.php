<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Supervisor;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supervisors = Supervisor::all();

        return view('admin.supervisors.index', ['supervisors' => $supervisors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supervisor = new Supervisor;

        return view('admin.supervisors.create', [
            'supervisor' => $supervisor,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $supervisor = new Supervisor;
        foreach (['name_first', 'name_middle', 'name_last', 'contact_email1', 'contact_email2', 'contact_phone1', 'contact_phone2'] as $name) {
            $supervisor->$name = $request->$name === null ? '' : $request->$name;
        }
        $supervisor->save();

        return redirect()->route('admin.supervisors.show', ['id' => $supervisor->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function show(Supervisor $supervisor)
    {
        //
        return view('admin.supervisors.show', ['supervisor' => $supervisor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function edit(Supervisor $supervisor)
    {
        //
        return view('admin.supervisors.edit', ['supervisor' => $supervisor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supervisor $supervisor)
    {
        foreach (['name_first', 'name_middle', 'name_last', 'contact_email1', 'contact_email2', 'contact_phone1', 'contact_phone2'] as $name) {
            $supervisor->$name = $request->$name === null ? '' : $request->$name;
        }
        $supervisor->save();

        return redirect()->route('admin.supervisors.show', ['id' => $supervisor->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supervisor  $supervisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supervisor $supervisor)
    {
        $supervisor->delete();

        return redirect()->route('admin.supervisors.index');
    }
}
