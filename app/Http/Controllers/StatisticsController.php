<?php

namespace App\Http\Controllers;

use App\Models\announcement;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function showStatistics()
    {
        $announcementCount = announcement::count();
        $companyCount = Company::count();
        $userCount = User::count();

        return view('statistics', [
            'announcementCount' => $announcementCount,
            'companyCount' => $companyCount,
            'userCount' => $userCount,
        ]);
    }
}
