<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index() {
        $clients = Clients::all();
        return view('clients', ['clients' => $clients]);
    }

    public function create() {
        return view('/clients');
    }

    public function store(Request $request) {
        $client = new Clients;

        $validated = $request->validate([
           'clientName' => 'required',
           'clientPhone' =>  'required|digits:10|unique:clients',
            'clientEmail' => 'required|email|unique:clients',
            'clientEmergencyContact' => 'required'

        ]);

        $client->clientName = $request->clientName;
        $client->clientPhone = $request->clientPhone;
        $client->clientEmail = $request->clientEmail;
        $client->clientEmergencyContact = $request->clientEmergencyContact;

        $client->save();
        return redirect('/clients');

    }

    public function destroy($id) {
        if(Auth::user()->manager == '1') {
        Clients::findOrFail($id, 'clientId')->delete();
        return redirect('/clients')->with('alert', 'Deleted!');
        } else {
            return redirect('/clients')->with('alert', 'Only managers can perform this action!');
        }

    }

    public function showData($id) {
        $clients = Clients::find($id);
        return view('client_update', ['clients'=>$clients]);

    }

    public function update(Request $req)  {

        $clients = Clients::find($req->id);


        $clients->clientName = $req->clientNewName;
        $clients->clientPhone = $req->clientNewPhone;
        $clients->clientEmail = $req->clientNewEmail;
        $clients->clientEmergencyContact = $req->clientNewEmergencyContact;

        $clients->save();

        return redirect('clients');

    }
}
