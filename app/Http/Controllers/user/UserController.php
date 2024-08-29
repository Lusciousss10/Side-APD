<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Violation;
use App\Models\Statistics;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Menghitung jumlah total pelanggaran
        $totalViolations = Violation::count();
        $violationstatistic = Statistics::first(); // Ambil statistik pertama (asumsi ada hanya satu record)

        return view('dashboard', compact('totalViolations', 'violationstatistic'));
    }
}
