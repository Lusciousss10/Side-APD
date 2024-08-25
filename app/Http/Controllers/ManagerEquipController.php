<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerEquipController extends Controller
{
    public function index()
    {
        return view('manager.equip');
    }
}
