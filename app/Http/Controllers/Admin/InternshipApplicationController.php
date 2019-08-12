<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Internship;
use App\InternshipApplication;
use Illuminate\Http\Request;

class InternshipApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchConditions = $request->search_conditions ?? [];
        foreach (['keywords', 'internship_id', 'student_id', 'status_code_outcome_code', 'order_by'] as $name) {
            $searchConditions[$name] = $searchConditions[$name] ?? '';
        }

        $q = InternshipApplication::query();

        $internshipId = $request->internship_id ?? $request->internship_id;

        if ($searchConditions['keywords']) {
            $q->join('internships', 'internships.id', '=', 'internship_applications.internship_id');
            $q->join('students', 'students.id', '=', 'internship_applications.student_id');
            $k = sprintf('%%%s%%', $searchConditions['keywords']);

            $q->where('internships.name', 'LIKE', $k);
            $q->orWhere('internships.description', 'LIKE', $k);
            $q->orWhere('internships.position', 'LIKE', $k);

            $q->orWhere('students.name_first', 'LIKE', $k);
            $q->orWhere('students.name_middle', 'LIKE', $k);
            $q->orWhere('students.name_last', 'LIKE', $k);
            $q->orWhere('students.contact_email1', 'LIKE', $k);
            $q->orWhere('students.contact_email2', 'LIKE', $k);
            $q->orWhere('students.contact_phone1', 'LIKE', $k);
            $q->orWhere('students.contact_phone2', 'LIKE', $k);
        }

        if ($searchConditions['internship_id']) {
            $q->where('internship_id', $searchConditions['internship_id']);
        }

        if ($searchConditions['student_id']) {
            $q->where('student_id', $searchConditions['student_id']);
        }

        if ($searchConditions['status_code_outcome_code']) {
            $statusCode = strtok($searchConditions['status_code_outcome_code'], ':');
            $outcomeCode = strtok('');
            $q->where('status_code', $statusCode);
            $q->where('outcome_code', $outcomeCode);
        }

        if ($internshipId) {
            $q->where('internship_id', $internshipId);
        }

        if ($searchConditions['order_by']) {
            $column = strtok($searchConditions['order_by'], ':');
            $ascDesc = strtok('');
            $q->orderBy($column, $ascDesc);
        }

        $internshipApplications = $q->get();

        return view('admin.internship_applications.index', [
            'searchConditions' => $searchConditions,
            'internshipId' => $internshipId,
            'internshipApplications' => $internshipApplications,
        ]);
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $internshipId = $request->internship_id ?? $request->internship_id;
        $internshipApplication = new InternshipApplication;
        if ($internshipId) {
            $internshipApplication->$internshipId;
        }
        return view('admin.internship_applications.create', [
            'internshipId' => $internshipId,
            'internshipApplication' => $internshipApplication,
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
            'internship_id' => 'exists:internships,id',
            'student_id' => 'exists:students,id',
        ]);

        if ($request->internship_id && $request->student_id) {
            $internshipApplication = new InternshipApplication;

            foreach (['internship_id', 'student_id', 'status_code', 'outcome_code', 'notes'] as $name) {
                switch ($name) {
                case 'internship_id':
                case 'student_id':
                    $internshipApplication->$name = intval($request->$name);
                    break;

                default:
                    $internshipApplication->$name = $request->$name === null ? '' : $request->$name;
                }
            }
            $internshipApplication->save();

            return redirect()->route('admin.internshipApplications.show', ['id' => $internshipApplication->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InternshipApplications  $internshipApplications
     * @return \Illuminate\Http\Response
     */
    public function show(InternshipApplication $internshipApplication)
    {
        return view('admin.internship_applications.show', [
            'internshipApplication' => $internshipApplication],
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InternshipApplications  $internshipApplications
     * @return \Illuminate\Http\Response
     */
    public function edit(InternshipApplication $internshipApplication)
    {
        //
        return view('admin.internship_applications.edit', ['internshipApplication' => $internshipApplication]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InternshipApplications  $internshipApplications
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternshipApplication $internshipApplication)
    {
        $validatedData = $request->validate([
            'internship_id' => 'exists:internships,id',
            'student_id' => 'exists:students,id',
        ]);

        foreach (['internship_id', 'student_id', 'status_code_outcome_code', 'notes'] as $name) {
            switch ($name) {
            case 'internship_id':
            case 'student_id':
                $internshipApplication->$name = intval($request->$name);
                break;

            case 'status_code_outcome_code':
                $statusCode = strtok($request->$name, ':');
                $outcomeCode = strtok('');
                $internshipApplication->status_code = $statusCode;
                $internshipApplication->outcome_code = $outcomeCode ?: '';
                break;

            default:
                $internshipApplication->$name = $request->$name === null ? '' : $request->$name;
            }
        }
        $internshipApplication->save();

        return redirect()->route('admin.internshipApplications.show', ['id' => $internshipApplication->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InternshipApplications  $internshipApplications
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternshipApplication $internshipApplication)
    {
        $internshipApplication->delete();

        return redirect()->route('admin.internshipApplications.index');
    }
}
