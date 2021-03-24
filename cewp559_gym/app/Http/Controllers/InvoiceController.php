<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index() {
        $invoice = Invoice::all();
        $clients = Clients::all();
        $payment = Payment::all();
        $users = User::all();
        return view('invoice', ['invoice' => $invoice, 'clients' => $clients, 'payment' => $payment, 'users' => $users]);
    }

    public function create() {
        return view('/invoice');
    }

    public function store(Request $request) {
        $invoice = new Invoice();

        $invoice->client = $request->clientID;
        $invoice->staff = $request->user;
        $invoice->payment = $request->paymentMethod;
        $invoice->amount = $request->amount;

        $invoice->save();
        return redirect('/invoice');

    }

    public function destroy($id) {
        if(Auth::user()->manager == '1') {
        Invoice::findOrFail($id, 'id')->delete();
            return redirect('/invoice')->with('alert', 'Deleted!');
        } else {
            return redirect('/invoice')->with('alert', 'Only managers can perform this action!');
        }


    }

    public function showData($id) {
        $invoice = Invoice::find($id);
        return view('invoice', ['invoice'=>$invoice]);

    }

    public function update(Request $req)  {

        $invoice = Invoice::find($req->id);


        $invoice->client = $req->clientNewName;
        $invoice->staff = $req->staffNewName;
        $invoice->payment = $req->newPayment;
        $invoice->amount = $req->newAmount;

        $invoice->save();

        return redirect('invoice');

    }
}
