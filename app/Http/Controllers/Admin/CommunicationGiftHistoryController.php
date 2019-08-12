<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\CommunicationGiftHistory;
use Illuminate\Http\Request;

class CommunicationGiftHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companyStaffId = $request->company_staff_id ?? null;
        $adminId = $request->admin_id ?? null;

        $q = CommunicationGiftHistory::query();

        if ($adminId) {
            $q->where('admin_id', $adminId);
        }

        if ($companyStaffId) {
            $q->where('company_staff_id', $companyStaffId);
        }

        $communicationGiftHistories = $q->get();

        return view('admin.communication_gift_histories.index', [
            'companyStaffId' => $companyStaffId,
            'communicationGiftHistories' => $communicationGiftHistories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $communicationGiftHistory = new CommunicationGiftHistory;
        $communicationGiftHistory->admin_id = $request->admin_id;
        $communicationGiftHistory->company_staff_id = $request->company_staff_id;

        return view('admin.communication_gift_histories.create', [
            'communicationGiftHistory' => $communicationGiftHistory,
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

        $communicationGiftHistory = new CommunicationGiftHistory;

        foreach (['admin_id', 'company_staff_id', 'sent_on', 'notes'] as $name) {
            switch ($name) {
                case 'admin_id':
                case 'company_staff_id':
                    $communicationGiftHistory->$name = intval($request->$name);
                    break;

            default:
                $communicationGiftHistory->$name = $request->$name === null ? '' : $request->$name;
            }
        }
        $communicationGiftHistory->save();

        return redirect()->route('admin.communicationGiftHistories.show', ['id' => $communicationGiftHistory->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CommunicationGiftHistory  $communicationGiftHistory
     * @return \Illuminate\Http\Response
     */
    public function show(CommunicationGiftHistory $communicationGiftHistory)
    {
        return view('admin.communication_gift_histories.show', ['communicationGiftHistory' => $communicationGiftHistory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CommunicationGiftHistory  $communicationGiftHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(CommunicationGiftHistory $communicationGiftHistory)
    {
        return view('admin.communication_gift_histories.edit', ['communicationGiftHistory' => $communicationGiftHistory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CommunicationGiftHistory  $communicationGiftHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommunicationGiftHistory $communicationGiftHistory)
    {
        $validatedData = $request->validate([
            'admin_id' => 'exists:admins,id',
            'company_staff_id' => 'exists:company_staff,id',
            'notes' => 'required|string',
        ]);

        foreach (['admin_id', 'company_staff_id', 'sent_on', 'notes'] as $name) {
            switch ($name) {
                case 'admin_id':
                case 'company_staff_id':
                    $communicationGiftHistory->$name = intval($request->$name);
                    break;

            default:
                $communicationGiftHistory->$name = $request->$name === null ? '' : $request->$name;
            }
        }

        $communicationGiftHistory->save();

        return view('admin.communication_gift_histories.show', [
            'communicationGiftHistory' => $communicationGiftHistory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CommunicationGiftHistory  $communicationGiftHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommunicationGiftHistory $communicationGiftHistory)
    {
        $communicationGiftHistory->delete();

        return redirect()->route('admin.communicationGiftHistories.index');
    }
}
