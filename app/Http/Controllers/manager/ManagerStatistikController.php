<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Statistics;
use App\Models\Violation;
use Illuminate\Http\Request;

class ManagerStatistikController extends Controller
{
    public function index()
    {
        $totalViolations = Violation::count();
        $violationstatistic = Statistics::firstOrCreate([
            'id' => 1
        ]);

        return view('manager.dashboard', compact('totalViolations', 'violationstatistic'));
    }

    public function edit()
    {
        $violationstatistic = Statistics::firstOrCreate([
            'id' => 1
        ]);

        return view('manager.edit-statistics', compact('violationstatistic'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'jumlah_meninggal' => 'required|integer',
            'jumlah_kasus_ditindaklanjuti' => 'required|integer',
        ]);

        $statistics = Statistics::firstOrCreate([
            'id' => 1
        ]);

        $statistics->jumlah_meninggal = $request->jumlah_meninggal;
        $statistics->jumlah_kasus_ditindaklanjuti = $request->jumlah_kasus_ditindaklanjuti;
        $statistics->save();

        return redirect()->route('manager.dashboard')->with('success', 'Statistics updated successfully.');
    }
}
