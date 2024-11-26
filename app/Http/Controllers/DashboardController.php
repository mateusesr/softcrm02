<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AttendanceController;
use App\Models\Attendance;

class DashboardController extends Controller
{
    public function index()
    {   
        $urgentAttendances = Attendance::with('client', 'type')
        ->where('status', 'urgente')
        ->orderBy('date', 'desc')
        ->take(5)
        ->get();
        $attendanceController = new AttendanceController();
        $recentAttendances = $attendanceController->getRecentAttendances(); // Obtem os últimos atendimentos
    
        return view('dashboard', compact('recentAttendances', 'urgentAttendances'));
    }
}
