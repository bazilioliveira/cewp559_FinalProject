<?php

namespace App\Http\Controllers;

use App\Models\Managers;
use Illuminate\Http\Request;
use DB;

class ManagerController extends Controller
{
    public function index() {
        $managers = Managers::all();
        return view('managers')->with("managers", $managers);
    }
}
