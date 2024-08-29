<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Violation;
use App\Models\Statistics;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalViolations = Violation::count();
        $violationstatistic = Statistics::first(); // Ambil statistik pertama (asumsi ada hanya satu record)

        return view('admin.dashboard', compact('totalViolations', 'violationstatistic'));
    }
}
