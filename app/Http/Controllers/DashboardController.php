<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Direct the user to their specific role-based folder
        switch ($user->role) {
            case 'admin':
                return view('admin.dashboard');
            case 'school_head':
                return view('school_head.dashboard');
            case 'counselor':
                return view('counselor.dashboard');
            case 'teacher':
            default:
                return view('teacher.dashboard');
        }
    }
}
