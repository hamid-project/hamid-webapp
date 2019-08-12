<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\CompanyStaff;
use Illuminate\Http\Request;

class CompanyStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $searchConditions = $request->search_conditions ?? [];
        foreach (['keywords', 'company_id', 'order_by'] as $name) {
            $searchConditions[$name] = $searchConditions[$name] ?? '';
        }

        $companyId = $request->company_id ?? null;
        $q = CompanyStaff::query();

        if ($searchConditions['keywords']) {
            $k = sprintf('%%%s%%', $searchConditions['keywords']);
            $q->where('name_first', 'LIKE', $k);
            $q->orWhere('name_middle', 'LIKE', $k);
            $q->orWhere('name_last', 'LIKE', $k);
            $q->orWhere('contact_email1', 'LIKE', $k);
            $q->orWhere('contact_email2', 'LIKE', $k);
            $q->orWhere('contact_phone1', 'LIKE', $k);
            $q->orWhere('contact_phone2', 'LIKE', $k);
        }

        foreach (['company_id'] as $name) {
            if ($searchConditions[$name]) {
                $q->where($name, $searchConditions[$name]);
            }
        }

        if ($companyId) {
            $q->where('company_id', $companyId);
        }

        if ($searchConditions['order_by']) {
            $column = strtok($searchConditions['order_by'], ':');
            $ascDesc = strtok('');
            $q->orderBy($column, $ascDesc);
        }

        $companyStaff = $q->get();

        return view('admin.company_staff.index', [
            'searchConditions' => $searchConditions,
            'companyId' => $companyId,
            'companyStaff' => $companyStaff,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $companyStaff = new CompanyStaff;
        $companyStaff->company_id = $request->company_id;

        return view('admin.company_staff.create', [
            'companyStaff' => $companyStaff,
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
        $companyStaff = new CompanyStaff;

        $validatedData = $request->validate([
            'name_first'=> 'required|min:1|max:20',
            'name_middle'=> 'nullable|min:1|max:20',
            'name_last'=> 'required|min:1|max:20',
            'contact_email1' => 'required|email|min:3|max:100',
            'contact_email2' => 'nullable|email|min:3|max:100',
            'contact_phone1' => 'nullable|min:9|max:20',
            'contact_phone2' => 'nullable|min:9|max:20',

            'department' => 'string|min:3|max:30',
            'address' => 'string|min:10|max:100',
            'website' => 'url|min:7|max:100',

            'company_id' => 'exists:companies,id'
        ]);

        if ($request->company_id) {
            $companyStaff->company_id = $request->company_id;
        }

        foreach (['name_first', 'name_middle', 'name_last', 'contact_email1', 'contact_phone1', 'department', 'address', 'website', 'acceptance_corporate_gift', 'acceptance_internship'] as $name) {
            switch ($name) {
            case 'acceptance_corporate_gift':
            case 'acceptance_internship':
                $companyStaff->$name = $request->$name ? true : false;
                break;

            default:
                $companyStaff->$name = $request->$name === null ? '' : $request->$name;
            }
        }
        $companyStaff->save();

        return redirect()->route('admin.companyStaff.show', ['id' => $companyStaff->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CompanyStaffs  $companyStaffs
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyStaff $companyStaff)
    {
        $communicationContactHistories = \App\CommunicationContactHistory::where('company_staff_id', $companyStaff->id)->orderBy('sent_on', 'desc')->limit(5)->get();
        $communicationGiftHistories = \App\CommunicationGiftHistory::where('company_staff_id', $companyStaff->id)->orderBy('sent_on', 'desc')->limit(5)->get();
        $internships = \App\Internship::where('company_staff_id', $companyStaff->id)->orderBy('updated_at', 'desc')->limit(5)->get();

        return view('admin.company_staff.show', [
            'communicationContactHistories' => $communicationContactHistories,
            'communicationGiftHistories' => $communicationGiftHistories,
            'internships' => $internships,
            'companyStaff' => $companyStaff,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CompanyStaffs  $companyStaffs
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyStaff $companyStaff)
    {
        return view('admin.company_staff.edit', ['companyStaff' => $companyStaff]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyStaffs  $companyStaffs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyStaff $companyStaff)
    {
        $validatedData = $request->validate([
            'name_first'=> 'required|min:1|max:20',
            'name_middle'=> 'nullable|min:1|max:20',
            'name_last'=> 'required|min:1|max:20',
            'contact_email1' => 'required|email|min:3|max:100',
            'contact_email2' => 'nullable|email|min:3|max:100',
            'contact_phone1' => 'nullable|min:9|max:20',
            'contact_phone2' => 'nullable|min:9|max:20',

            'department' => 'string|min:3|max:30',
            'address' => 'string|min:10|max:100',
            'website' => 'url|min:7|max:100',

            'company_id' => 'exists:companies,id'
        ]);

		foreach (['name_first', 'name_middle', 'name_last', 'contact_email1', 'contact_phone1', 'company_id', 'department', 'address', 'website', 'acceptance_corporate_gift', 'acceptance_internship'] as $name) {
			switch ($name) {
			case 'acceptance_corporate_gift':
			case 'acceptance_internship':
                $companyStaff->$name = $request->$name ? true : false;
                break;

            default:
				$companyStaff->$name = $request->$name === null ? '' : $request->$name;
			}
		}
		$companyStaff->save();

        return redirect()->route('admin.companyStaff.show', ['id' => $companyStaff->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyStaffs  $companyStaffs
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyStaff $companyStaff)
    {
        $companyStaff->delete();

        return redirect()->route('admin.companyStaff.index');
    }

}
