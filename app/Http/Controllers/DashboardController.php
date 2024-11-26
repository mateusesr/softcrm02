<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AttendanceController;

class DashboardController extends Controller
{
    public function index()
    {   
        $attendanceController = new AttendanceController();
        $recentAttendances = $attendanceController->getRecentAttendances(); // Obtem os últimos atendimentos
    
        return view('dashboard', compact('recentAttendances'));
    }
}
