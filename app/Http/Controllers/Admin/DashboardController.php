<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $users = User::all()->count();
        $transactions = Transaction::all()->count();

        return view('admin.dashboard', compact('users','transactions'));
    }
}
