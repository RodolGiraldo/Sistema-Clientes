@extends('layouts.main')
@section('content')
<header>
    <h1 class="text-center alert alert-secondary">Edit Client</h1>
</header>
<div class="col">
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                - {{$error}}<br>
            @endforeach
        </div>
    @endif
</div>
        <div class="container-fluid alert alert-success">
            @foreach ($clients as $client) 
                <form action="/clients/{{$client->id}}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col">
                        
                            <label for="documenttype">Document Type:</label>
                            <select name="documenttype" id="documenttype" class="form-control">
                                <option value="">Seleccionar...</option>
                                @foreach($documents as $document)
                                    @if($client->document_type_id == $document->id)
                                    <option value="{{$document->id}}" selected>{{$document->DocumentType}}</option>
                                    @else
                                    <option value="{{$document->id}}">{{$document->DocumentType}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>                                                                                     
                        <div class="form-group col">
                            <label for="idnumber">Id Number:</label>
                            <input type="text" readonly class="form-control" id="idnumber" name="idnumber" value="{{old('idnumber',$client->IdNumber)}}" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="firstname">First Name:</label>
                            <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('firstname',$client->FirstName)}}">
                        </div>
                        <div class="form-group col">
                            <label for="lastname">Last Name:</label>
                            <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname',$client->LastName)}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                        
                            <label for="gender">Gender:</label>
                            @if($client->Gender == 'Male')
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Seleccionar...</option>
                                <option value="Male" selected>Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Others</option>
                            </select>
                            @elseif($client->Gender == 'Female')
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Seleccionar...</option>
                                <option value="Male">Male</option>
                                <option value="Female" selected>Female</option>
                                <option value="Other">Others</option>
                            </select>
                            @else
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Seleccionar...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other" selected>Others</option>
                            </select>
                            @endif
                        </div>
                        <div class="form-group col">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{old('address',$client->Address)}}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email',$client->Email)}}">
                        </div>
                        <div class="form-group col">
                            <label for="phonenumber">Phone Number:</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{old('phonenumber',$client->PhoneNumber)}}">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <a class="btn btn-secondary col" href="/clients">Back</a>
                        <button type="submit" class="btn btn-primary col">Update</button>
                    </div>
                </form>
            @endforeach
        </div>

@endsection