<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopController extends Controller
{
    public function dashboard()
    {
        $recentCreatedStudents = \App\Student::orderBy('created_at', 'desc')->limit(5)->get();
        $recentUpdatedStudents = \App\Student::orderBy('updated_at', 'desc')->limit(5)->get();
        $communicationContactHistories = \App\CommunicationContactHistory::orderBy('sent_on', 'desc')->limit(5)->get();
        $communicationGiftHistories = \App\CommunicationGiftHistory::orderBy('sent_on', 'desc')->limit(5)->get();
        $internships = \App\Internship::orderBy('updated_at', 'desc')->limit(5)->get();

        return view('admin.top.dashboard', [
            'recentCreatedStudents' => $recentCreatedStudents,
            'recentUpdatedStudents' => $recentUpdatedStudents,
            'communicationContactHistories' => $communicationContactHistories,
            'communicationGiftHistories' => $communicationGiftHistories,
            'internships' => $internships,
        ]);
    }
}
