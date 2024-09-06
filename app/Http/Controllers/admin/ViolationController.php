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
        $violations = Violation::paginate(5);
        return view('admin.violations', compact('violations'));
    }

    // Mengunduh file
    public function downloadPhoto($id)
    {
        // Cari data berdasarkan ID
        $violation = Violation::findOrFail($id);

        // Ambil data file dari kolom blob (misalnya kolom file_data)
        $fileData = $violation->file_data; // 'file_data' adalah kolom blob di database
        $mimeType = $violation->mime_type; // Pastikan ada kolom 'mime_type' di database

        // Beri nama file yang akan diunduh
        $filename = $violation->filename;

        // Buat respons download
        return Response::make($fileData, 200, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]);
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
