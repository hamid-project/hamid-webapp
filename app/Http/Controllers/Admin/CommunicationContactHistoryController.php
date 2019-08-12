<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\CommunicationContactHistory;
use Illuminate\Http\Request;

class CommunicationContactHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyStaffId = $request->company_staff_id ?? null;
        $adminId = $request->admin_id ?? null;

        $q = CommunicationContactHistory::query();

        if ($adminId) {
            $q->where('admin_id', $adminId);
        }

        if ($companyStaffId) {
            $q->where('company_staff_id', $companyStaffId);
        }

        $communicationContactHistories = $q->get();

        return view('admin.communication_contact_histories.index', [
            'companyStaffId' => $companyStaffId,
            'communicationContactHistories' => $communicationContactHistories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $communicationContactHistory = new CommunicationContactHistory;
        $communicationContactHistory->admin_id = $request->admin_id;
        $communicationContactHistory->company_staff_id = $request->company_staff_id;

        return view('admin.communication_contact_histories.create', [
            'communicationContactHistory' => $communicationContactHistory,
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
            'admin_id' => 'exists:admins,id',
            'company_staff_id' => 'exists:company_staff,id',
            'notes' => 'required|string',
        ]);

        $communicationContactHistory = new CommunicationContactHistory;

        foreach (['admin_id', 'company_staff_id', 'method', 'sent_on', 'notes'] as $name) {
            switch ($name) {
                case 'admin_id':
                case 'company_staff_id':
                    $communicationContactHistory->$name = intval($request->$name);
                    break;

            case 'method':
                $methodCode = strtok($request->$name, ':');
                $labelCode = strtok('');
                $communicationContactHistory->method_code = $methodCode;
                $communicationContactHistory->label_code = $labelCode? $labelCode : '';
                break;

            default:
                $communicationContactHistory->$name = $request->$name === null ? '' : $request->$name;
            }
        }

        $communicationContactHistory->save();

        return redirect()->route('admin.communicationContactHistories.show', ['id' => $communicationContactHistory->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommunicationContactHistory  $communicationContactHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CommunicationContactHistory $communicationContactHistory)
    {
        return view('admin.communication_contact_histories.show', ['communicationContactHistory' => $communicationContactHistory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommunicationContactHistory  $communicationContactHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunicationContactHistory $communicationContactHistory)
    {
        return view('admin.communication_contact_histories.edit', ['communicationContactHistory' => $communicationContactHistory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommunicationContactHistory  $communicationContactHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunicationContactHistory $communicationContactHistory)
    {
        $validatedData = $request->validate([
            'admin_id' => 'exists:admins,id',
            'company_staff_id' => 'exists:company_staff,id',
            'notes' => 'required|string',
        ]);

        foreach (['admin_id', 'company_staff_id', 'method', 'sent_on', 'notes'] as $name) {
            switch ($name) {
                case 'admin_id':
                case 'company_staff_id':
                    $communicationContactHistory->$name = intval($request->$name);
                    break;

            case 'method':
                $methodCode = strtok($request->$name, ':');
                $labelCode = strtok('');
                $communicationContactHistory->method_code = $methodCode;
                $communicationContactHistory->label_code = $labelCode? $labelCode : '';
                break;

            default:
                $communicationContactHistory->$name = $request->$name === null ? '' : $request->$name;
            }
        }

        $communicationContactHistory->save();

        return view('admin.communication_contact_histories.show', [
            'communicationContactHistory' => $communicationContactHistory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommunicationContactHistory  $communicationContactHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunicationContactHistory $communicationContactHistory)
    {
        $communicationContactHistory->delete();

        return redirect()->route('admin.communicationContactHistories.index');
    }
}
