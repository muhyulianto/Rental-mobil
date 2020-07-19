<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index() {
        $user = User::where('is_admin', 1)->first()->unreadNotifications;
        return view('adminDashboard')->with([
            'notifications' => $user
        ]);
   } 
}
