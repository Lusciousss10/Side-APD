<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::all();
        $violations = Violation::paginate(3);
        return view('admin.violations', compact('violations'));
    }

    // Mengunduh file
    public function download($filename)
    {
        $filePath = public_path('violations/' . $filename);

        if (File::exists($filePath)) {
            return Response::download($filePath);
        } else {
            return redirect()->route('admin.violations')->with('error', 'File not found');
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

        return redirect()->route('admin.violations')->with('success', 'Violation deleted successfully');
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

        return redirect()->route('admin.violations')->with('success', 'All violations deleted successfully');
    }
}
