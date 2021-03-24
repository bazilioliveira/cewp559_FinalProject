@extends('layouts.app')

@section('content')

    <!-- Conditional statement to prompt an alert -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form to update client information -->
    <h1 style="margin-top: 75px; border-top: 5px solid black ">Update client information</h1>
    <form action="/client_update" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$clients->clientId}}">
        <div class="form-group">
            <label for="clientNewName" id="clientNewName" name="clientNewName">Client name</label>
            <input type="text" class="form-control" value="{{$clients->clientName}}" name="clientNewName" style="margin-bottom: 20px;">
        </div>
        <div class="form-group">
            <label for="clientNewPhone" id="clientNewPhone" name="clientNewPhone">Phone</label>
            <input type="text" class="form-control" value="{{$clients->clientPhone}}" name="clientNewPhone" style="margin-bottom: 20px;">
        </div>
        <div class="form-group">
            <label for="clientNewEmail" id="clientNewEmail" name="clientNewEmail">Email</label>
            <input type="email" class="form-control" value="{{$clients->clientEmail}}" name="clientNewEmail" style="margin-bottom: 20px;">
        </div>
        <div class="form-group">
            <label for="clientNewEmergencyContact" id="clientNewEmergencyContact" name="clientNewEmergencyContact">Emergency contact</label>
            <input type="text" class="form-control" value="{{$clients->clientEmergencyContact}}" name="clientNewEmergencyContact" style="margin-bottom: 20px;">
        </div>

        <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update">
    </form>


@endsection
