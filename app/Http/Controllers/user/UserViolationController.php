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
        $violations = Violation::paginate(3);
        return view('userviolations', compact('violations'));
    }

    public function download($filename)
    {
        $filePath = public_path('violations/' . $filename);

        if (File::exists($filePath)) {
            return Response::download($filePath);
        } else {
            return redirect()->route('userviolations')->with('error', 'File not found');
        }
    }
}
