<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Internship;
use Illuminate\Http\Request;

class InternshipController extends Controller
{
    const STATUS_OPEN = 1;
    const STATUS_CLOSED = 2;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchConditions = $request->search_conditions ?? [];
        foreach (['keywords', 'date', 'supervisor_id', 'company_staff_id', 'order_by'] as $name) {
            $searchConditions[$name] = $searchConditions[$name] ?? '';
        }

        $q = Internship::query();

        if ($searchConditions['keywords']) {
            $k = sprintf('%%%s%%', $searchConditions['keywords']);
            $q->where('name', 'LIKE', $k);
            $q->orWhere('description', 'LIKE', $k);
            $q->orWhere('position', 'LIKE', $k);
        }

        if ($searchConditions['date']) {
            $q->where('internship_begin', '<=', $searchConditions['date']);
            $q->where('internship_end', '>=', $searchConditions['date']);
        }

        if ($searchConditions['supervisor_id']) {
            $q->where('supervisor_id', $searchConditions['supervisor_id']);
        }

        if ($searchConditions['company_staff_id']) {
            $q->where('company_staff_id', $searchConditions['company_staff_id']);
        }

        if ($searchConditions['order_by']) {
            $column = strtok($searchConditions['order_by'], ':');
            $ascDesc = strtok('');
            $q->orderBy($column, $ascDesc);
        }

        $companyId = $request->company_id ?? null;
        $supervisorId = $request->supervisor_id ?? null;
        $companyStaffId = $request->company_staff_id ?? null;
        if ($companyId) {
            $q->join('company_staff', 'company_staff.id', '=', 'internship.company_staff_id');
            $q->join('companies', 'companies.id', '=', 'company_staff.company_id');
            $q->where('company_staff.company_id', $companyId);
        }
        if ($companyStaffId) {
            $q->where('company_staff_id', $companyStaffId);
        }
        if ($supervisorId) {
            $q->where('supervisor_id', $supervisorId);
        }
        $internships = $q->get();

        return view('admin.internships.index', [
            'companyId' => $companyId,
            'companyStaffId' => $companyStaffId,
            'supervisorId' => $supervisorId,
            'searchConditions' => $searchConditions,
            'internships' => $internships,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $internship = new Internship;
        $internship->company_staff_id = $request->company_staff_id;

        return view('admin.internships.create', [
            'internship' => $internship,
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
        $validatedData = $request->validate([
            'name' => 'string|required',
            'position' => 'string|required',
            'description' => 'string|required',
            'internship_begin'=> 'date|nullable',
            'internship_end'=> 'date|nullable|after:internship_begin',
            'supervisor_id' => 'exists:supervisors,id',
            'company_staff_id' => 'exists:company_staff,id',
            'status' => 'integer|in:1,2',
            'number_of_interns' => 'integer|min:1',
        ]);

        $internship = new Internship;

        foreach ([
            'company_staff_id', 'supervisor_id', 'number_of_interns',
            'name', 'description', 'position',
            'internship_begin', 'internship_end',
            'status',
            'area_codes', 'specialisation_codes', 'transportation_codes',
        ] as $name) {
            switch ($name) {
            case 'number_of_interns':
            case 'company_staff_id':
            case 'supervisor_id':
            case 'status':
                $internship->$name = intval($request->$name);
                break;

            case 'specialisation_codes':
            case 'transportation_codes':
            case 'area_codes':
                $potentials = $internship->potentials;
                $potentials[$name] = empty($request->$name) ? [] : $request->$name;
                $internship->potentials = $potentials;
                break;

            case 'internship_begin':
                $internship->$name = $request->$name === null ? \App\BaseModel::DATE_TIME_MIN : $request->$name;
                break;

            case 'internship_end':
                $internship->$name = $request->$name === null ? \App\BaseModel::DATE_TIME_MAX : $request->$name;
                break;

            default:
                $internship->$name = $request->$name === null ? '' : $request->$name;
            }
        }
        $internship->status = self::STATUS_OPEN;
        $internship->save();

        return redirect()->route('admin.internships.show', ['id' => $internship->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Internship  $internship
     * @return \Illuminate\Http\Response
     */
    public function show(Internship $internship)
    {
        $students = \App\Student::getByInternship($internship);

        return view('admin.internships.show', [
            'students' => $students,
            'internship' => $internship,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Internships  $internships
     * @return \Illuminate\Http\Response
     */
    public function edit(Internship $internship)
    {
        $internship->internship_begin = $internship->internship_begin == \App\BaseModel::DATE_MIN ? null : $internship->internship_begin;
        $internship->internship_end = $internship->internship_end == \App\BaseModel::DATE_MAX ? null : $internship->internship_end;

        return view('admin.internships.edit', ['internship' => $internship]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Internships  $internships
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Internship $internship)
    {
        $validatedData = $request->validate([
            'name' => 'string|required',
            'position' => 'string|required',
            'description' => 'string|required',
            'internship_begin'=> 'date|nullable',
            'internship_end'=> 'date|nullable|after:internship_begin',
            'supervisor_id' => 'exists:supervisors,id',
            'company_staff_id' => 'exists:company_staff,id',
            'status' => 'integer|in:1,2',
            'number_of_interns' => 'integer|min:1',
        ]);

        foreach ([
            'company_staff_id', 'supervisor_id', 'number_of_interns',
            'name', 'description', 'position',
            'internship_begin', 'internship_end',
            'status',
            'area_codes', 'specialisation_codes', 'transportation_codes',
        ] as $name) {
            switch ($name) {
            case 'number_of_interns':
            case 'company_staff_id':
            case 'supervisor_id':
            case 'status':
                $internship->$name = intval($request->$name);
                break;

            case 'specialisation_codes':
            case 'transportation_codes':
            case 'area_codes':
                $potentials = $internship->potentials;
                $potentials[$name] = empty($request->$name) ? [] : $request->$name;
                $internship->potentials = $potentials;
                break;

            case 'internship_begin':
                $internship->$name = $request->$name === null ? \App\BaseModel::DATE_TIME_MIN : $request->$name;
                break;

            case 'internship_end':
                $internship->$name = $request->$name === null ? \App\BaseModel::DATE_TIME_MAX : $request->$name;
                break;

            default:
                $internship->$name = $request->$name === null ? '' : $request->$name;
            }
        }

        $internship->save();

        return redirect()->route('admin.internships.show', ['id' => $internship->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Internships  $internships
     * @return \Illuminate\Http\Response
     */
    public function destroy(Internship $internship)
    {
        $internship->delete();

        return redirect()->route('admin.internships.index');
    }
}
