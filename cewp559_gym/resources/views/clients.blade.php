@extends('layouts.app')

@section('content')
    <!-- Table to display client information -->
        <table id="myTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Emergency Contact</th>
                <th>Member since</th>
                <th>Actions</th>
            </tr>
            </thead>

            <!-- Conditional statement for alert -->
            @if (session('alert'))
                <div class="alert alert-primary">
                    {{ session('alert') }}
                </div>
            @endif


            @foreach($clients as $client)
            <tbody>
            <tr>

                <td>{{$client->clientName}}</td>
                <td>{{$client->clientPhone}}</td>
                <td>{{$client->clientEmail}}</td>
                <td>{{$client->clientEmergencyContact}}</td>
                <td>{{$client->clientDateOfSubscription}}</td>

                <td>
                    <form action="client_update/{{$client->clientId}}">
                    <button  title="EDIT" type="submit" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg> Edit</button>
                    </form>
                    <form method="POST" action="clients/{{$client->clientId}}">
                        @csrf
                        @method('DELETE')
                        <button  href="clients" title="DELETE" type="submit" class="btn btn-danger delete" onclick="return confirm('Are you sure you want to delete this client?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg> Delete</button>
                    </form>

                </td>

                @endforeach
            </tr>
            </tbody>

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

    <!-- Form to add client information -->
        <h1 style="margin-top: 75px; border-top: 5px solid black ">Add a new client</h1>
        <form action="/clients" method="POST">
            @csrf
            <div class="form-group">
                <label for="clientName" id="clientName" name="clientName">Client name</label>
                <input type="text" class="form-control" placeholder="Enter client name" name="clientName" style="margin-bottom: 20px;">
            </div>
            <div class="form-group">
                <label for="clientPhone" id="clientPhone" name="clientPhone">Phone</label>
                <input type="text" class="form-control" placeholder="Phone" name="clientPhone" style="margin-bottom: 20px;">
            </div>
            <div class="form-group">
                <label for="clientEmail" id="clientEmail" name="clientEmail">Email</label>
                <input type="email" class="form-control" placeholder="Email" name="clientEmail" style="margin-bottom: 20px;">
            </div>
            <div class="form-group">
                <label for="clientEmergencyContact" id="clientEmergencyContact" name="clientEmergencyContact">Emergency contact</label>
                <input type="text" class="form-control" placeholder="Emergency contact" name="clientEmergencyContact" style="margin-bottom: 20px;">
            </div>

            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Add">
        </form>


@endsection
