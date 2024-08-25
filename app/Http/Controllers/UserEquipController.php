<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserEquipController extends Controller
{
    public function index()
    {
        return view('equip');
    }
}
