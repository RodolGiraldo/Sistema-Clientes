@extends('layouts.main')
@section('content')
<header>
    <h1 class="text-center alert alert-secondary"><a href="/clients">Clients</a></h1>
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
<div class="alert alert-success relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
    <div class="row">
        <div class="col-7">
            <a class="btn btn-primary" href="/clients/create">Create New Client</a> 
        </div>
        <div class="col">
            <form action="/search" method="GET">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" id="idnumber" name="idnumber" value="{{old('idnumber')}}" placeholder="Document Number">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-secondary" value="Search">  
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col col">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="text-center">Id Number</th>
                        <th scope="col" class="text-center">Document Type</th>
                        <th scope="col" class="text-center">First Name</th>
                        <th scope="col" class="text-center">Last Name</th>
                        <th scope="col" class="text-center">Gender</th>
                        <th scope="col" class="text-center">Addres</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Phone Number</th>
                        <th scope="col" class="text-center"> </th>
                        <th scope="col" class="text-center"> </th>
                    </tr>    
                </thead>
                @if($clients == null)
                <tbody>
                    <td>
                        No se encontraron clientes
                    </td>
                </tbody>    
                
                @else
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td scope="col" class="text-center">{{$client->IdNumber}}</td>
                            @foreach($documents as $document)
                                @if ($client->document_type_id == $document->id)
                                    <td scope="col" class="text-center">{{$document->DocumentType}}</td>
                                @endif
                            @endforeach
                            <td scope="col" class="text-center">{{$client->FirstName}}</td>
                            <td scope="col" class="text-center">{{$client->LastName}}</td>
                            <td scope="col" class="text-center">{{$client->Gender}}</td>
                            <td scope="col" class="text-center">{{$client->Address}}</td>
                            <td scope="col" class="text-center">{{$client->Email}}</td>
                            <td scope="col" class="text-center">{{$client->PhoneNumber}}</td>
                            <td scope="col" class="text-center"> <a class="btn btn-primary" href="/clients/{{$client->id}}/edit">Edit</a> </td>
                            <td>
                                <form action="{{route('clients.destroy', $client->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input 
                                        type="submit"   
                                        class="btn btn-secondary"
                                        value="Delete"
                                        onClick="return confirm('¿Está seguro que quiere eliminar el cliente?')"                            
                                    />
                                </form>    
                            </td>
                        </tr>
                        <br>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection