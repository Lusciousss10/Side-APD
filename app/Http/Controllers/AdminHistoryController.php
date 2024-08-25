<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHistoryController extends Controller
{
    public function index()
    {
        return view('admin.history');
    }
}
