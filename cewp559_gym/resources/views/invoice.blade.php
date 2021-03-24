@extends('layouts.app')

@section('content')
    <!-- Form to display invoice information -->
    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Invoice ID</th>
            <th>Date</th>
            <th>Client</th>
            <th>Staff</th>
            <th>Payment Method</th>
            <th>Amount</th>
        </tr>
        </thead>

            <tbody>
            <tr>

                <!-- Conditional statement for alerts -->
            @if (session('alert'))
                    <div class="alert alert-primary">
                        {{ session('alert') }}
                    </div>
                @endif

                @foreach($invoice as $invoices)
                <td>{{$invoices->id}}</td>
                <td>{{$invoices->created_at}}</td>
                <td>{{$invoices->client}}</td>
                <td>{{$invoices->staff}}</td>
                <td>{{$invoices->payment}}</td>
                <td>{{$invoices->amount}}</td>



                <td><form method="POST" action="invoice/{{$invoices->id}}">
                        @csrf
                    @method('DELETE')
                    <button  href="invoice" title="DELETE" type="submit" class="btn btn-danger delete" onclick="return confirm('Are you sure you want to delete this invoice?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg> Delete</button>
                    </form></td>
            </tr>

            </tbody>
        @endforeach

    </table>



    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1 style="margin-top: 75px; border-top: 5px solid black ">Add a new invoice</h1>
    <form action="/invoice" method="POST">
        @csrf
        <div class="form-group">
            <label for="clientID" id="clientID" name="clientID">Client</label>
            <select name="clientID" id="clientID">
                @foreach($clients as $client)
                    <option name="clientID" type="number">{{$client->clientId}} -- {{$client->clientName}}</option>
                @endforeach
            </select>

        </div>

        <div class="form-group">
            <label for="paymentMethod" id="paymentMethod" name="paymentMethod">Payment method</label>
                <select name="paymentMethod" id="paymentMethod">
                    @foreach($payment as $payment)
                    <option type="number">{{$payment->paymentId}} -- {{$payment->paymentMethod}}</option>
                    @endforeach
                </select>
        </div>

        <div class="form-group">
            <label for="user" id="user" name="user">Staff</label>
            <select name="user" id="user">
                @foreach($users as $user)
                    <option type="number">{{$user->id}} -- {{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount" id="amount" name="amount">Amount</label>
            <input type="text" class="form-control" placeholder="Enter amount" name="amount" style="margin-bottom: 20px;">
        </div>

        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Add">
    </form>


@endsection
