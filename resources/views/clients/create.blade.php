@extends('layouts.main')
@section('content')
<header>
    <h1 class="text-center alert alert-secondary">Create Clients</h1>

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

        <form action="/clients" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="documenttype">Document Type:</label>
                    <select name="documenttype" id="documenttype" class="form-control">
                        <option value="">Seleccionar...</option>
                        @foreach($documents as $document)
                            <option value="{{$document->id}}">{{$document->DocumentType}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col">
                    <label for="idnumber">Id Number:</label>
                    <input type="text" class="form-control" id="idnumber" name="idnumber" value="{{old('idnumber')}}" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="firstname">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="{{old('firstname')}}">
                </div>
                <div class="form-group col">
                    <label for="lastname">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname')}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="gender">Gender:</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Others</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group col">
                    <label for="phonenumber">Phone Number:</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{old('phonenumber')}}">
                </div>
            </div>
            
            <div class="form-row">
                <a class="btn btn-secondary col" href="/clients">Back</a>
                <button type="submit" class="btn btn-primary col">Create</button>
            </div>
        </form>
</div>

@endsection