<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // kalo parameter Request $request cuma dipake kalo ada parameter yang di oper kal
        return view('pages.admin.dashboard');
    }
}
