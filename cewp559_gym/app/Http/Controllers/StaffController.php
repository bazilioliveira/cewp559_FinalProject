<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Clients;
use DB;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    public function index() {
        $staff = Staff::all();
        $users = User::all();

        return view('staff', ['staff' => $staff, 'user' =>$users]);
    }

    public function create() {
        return view('/staff');
    }

    public function showData($id) {
        $clients = Clients::find($id);
        return view('client_update', ['clients'=>$clients]);

    }

    public function update(Request $req)  {
        if(Auth::user()->manager == '1') {
            $users = Clients::find($req->id);


            $users->id = $req->id;
            $users->name = $req->name;
            $users->email = $req->email;

            $users->save();

            return redirect('staff');
        } else {
            return redirect('/staff')->with('alert', 'Only managers can perform this action!');

        }
    }
}
