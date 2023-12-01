<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index (Request $request){

        $id = Auth() -> user() -> blockchainID;

        $applicationsCount = Application::where(['applicant' => $id]) -> count();
        $approvedApplicationsCount = Application::where(['applicant' => $id, 'status' => 'approved']) -> count();
        $pendingApplicationsCount = Application::where(['applicant' => $id, 'status' => 'pending']) -> count();

        $pendingApplicationsList = Application::where(['applicant' => $id, 'status' => 'pending']) -> orderBy('id', 'desc') -> get();
        $approvedApplicationsList = Application::where(['applicant' => $id, 'status' => 'approved' ]) -> orderBy('id', 'desc') -> limit(20) -> get();

        $approvedApplicationsPercentage = $applicationsCount > 0 ? ($approvedApplicationsCount/$applicationsCount) * 100 : 0;
        $pendingApplicationsPercentage = $applicationsCount > 0 ? ($pendingApplicationsCount/$applicationsCount) * 100 : 0;
        
        
        return view('user.dashboard', [
            'applicationsCount' => $applicationsCount,
            'approvedApplications' => [
                'count' => $approvedApplicationsCount,
                'percentage' => $approvedApplicationsPercentage,
                'list' => $approvedApplicationsList,
            ],
            'pendingApplications' => [
                'count' => $pendingApplicationsCount,
                'percentage' => $pendingApplicationsPercentage,
                'list' => $pendingApplicationsList
            ]
        ]);
    }
}
