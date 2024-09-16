<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Violation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class UserViolationController extends Controller
{
    public function index()
    {
        $violations = Violation::all();
        $violations = Violation::orderBy('time', 'desc')->get();
        $violations = Violation::paginate(5);
        return view('userviolations', compact('violations'));
    }

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

    public function destroy($id)
    {
        $violation = Violation::findOrFail($id);

        $filePath = public_path('violations/' . $violation->filename);
        if (File::exists($filePath)) {
            File::delete($filePath);
        }

        $violation->delete();

        return redirect()->route('user.violations')->with('success', 'Violation deleted successfully');
    }
}
