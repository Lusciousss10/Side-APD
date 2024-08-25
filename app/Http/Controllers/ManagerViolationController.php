<?php

namespace App\Http\Controllers;

use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ManagerViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::all();
        return view('manager.violations', compact('violations'));
    }

    // Mengunduh file
    public function download($filename)
    {
        $filePath = public_path('violations/' . $filename);

        if (File::exists($filePath)) {
            return Response::download($filePath);
        } else {
            return redirect()->route('manager.violations')->with('error', 'File not found');
        }
    }

    // Menghapus violation
    public function destroy($id)
    {
        $violation = Violation::findOrFail($id);

        $filePath = public_path('violations/' . $violation->filename);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $violation->delete();

        return redirect()->route('manager.violations')->with('success', 'Violation deleted successfully');
    }

    // Menghapus semua violations
    public function deleteAll()
    {
        $violations = Violation::all();

        foreach ($violations as $violation) {
            $filePath = public_path('violations/' . $violation->filename);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
            $violation->delete();
        }

        return redirect()->route('manager.violations')->with('success', 'All violations deleted successfully');
    }
}
